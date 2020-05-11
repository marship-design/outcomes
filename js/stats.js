var stats = (function(){

    var month = ["Zerowy","Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień", "Podsumowanie"];

    document.addEventListener("DOMContentLoaded", function(){
       
        var selectYearCategory = document.getElementById('selectYearCategory');
        var selectYearCategoryInit = M.FormSelect.init(selectYearCategory);
        // console.log(selectYearCategory);
        var selectCategory = document.getElementById('selectCategory');
        var selectCategoryInit = M.FormSelect.init(selectCategory);

        var selectMonth = document.getElementById('selectMonth');
        var selectMonthInit = M.FormSelect.init(selectMonth);

        var btnShowStats = document.getElementById("btn-showStats");
        
        btnShowStats.addEventListener("click", function(e){
            e.preventDefault();

            if(btnShowStats.name === "category"){
                showCategoryStats();
            }else if(btnShowStats.name === "month"){
                showMonthStats();                
            }           
        });        
    });

    var showMonthStats = function(){

        var year = selectYearCategory.value;
        var month = selectMonth.value;

        if(year === "" || month === ""){
            M.toast({html: 'Wybierz Rok i Miesiąc', displayLength: 2000});
        }else{
            getMonthStats(year, month);
            deleteDetailedView();                      
        }

    }

    var showCategoryStats = function(){

        var year = selectYearCategory.value;
        var category = selectCategory.value;

        if(year === "" || category === ""){
            M.toast({html: 'Wybierz Rok i Kategorię', displayLength: 2000});
        }else{
            getCategoryStats(year, category);
            deleteDetailedView();                      
        }
    }

    var deleteDetailedView = function(){

        var detailedView = document.getElementById('detailedSummary');
        detailedView.innerHTML = "";
    }

    var getMonthStats = function(year, month){

        ajax.getData("POST", "./api/monthStats.php", {"year": year, "month": month}, function(dane){

            var summaryMonthStats = document.getElementById("summary");

            if(dane.message !== "No Posts Found"){
                var res = prepareSummary(dane);            
                
                summaryMonthStats.innerHTML = prepareTable(res);

                attachMonthDetailedStats();
            }else{
                summaryMonthStats.innerHTML = "<p>Brak wyników</p>";
            }
        });

    }

    var attachMonthDetailedStats = function(){

        var statsYearMonth = document.getElementsByClassName("statsYearMonth");
        
        Array.prototype.forEach.call(statsYearMonth, function(el){
            el.addEventListener("click", function(e){
                // console.log("pokazanie wynikow z danej kategorii ", e.target.parentNode.dataset.idkategoria);
                //zapytanie do bazy o wydatki z danym rok, msc, idkategoria
                var id = e.target.parentNode.dataset.idkategoria;
                var kat = e.target.parentNode.dataset.kategoria;
                if(id !== "undefined"){
                    showDetailedMonthStats(id, kat);
                }else{
                    console.log("kliknieto w podsumowanie");
                }
            });
        });
    }

    var showDetailedMonthStats = function(id_kategorii, kat){

        //pobranie aktualnie wybranych danych z comboboxów, jak ktos zmieni stan i nie nadusi pokaż to
        //zwrócone zostaną dane dla innych wartości
        var year = document.getElementById("selectYearCategory").value;
        var month = document.getElementById("selectMonth").value;
        var monthName = getSelectedText("selectMonth");

                    // wpisac inny adres php
        ajax.getData("POST", "./api/statsDetailed.php", {"year": year, "month": month, "category": id_kategorii}, function(dane){
            // console.log(dane);

            var detailedView = document.getElementById("detailedSummary");
            detailedView.innerHTML = prepareDetailedStatsView(dane, year, monthName, kat);

        });
    }

    var getCategoryStats = function(year, category){
                
        ajax.getData("POST", "./api/categoryStats.php",{"year":year, "category":category}, function(dane){
            
            var summaryCategoryStats = document.getElementById("summary");

            if(dane.message !== "No Posts Found"){

                var res = prepareCategorySummary(dane);
                summaryCategoryStats.innerHTML = prepareCategoryTable(res, year, category);
                attachCategoryDetailedStats();
            }else {
                summaryCategoryStats.innerHTML = "<p>Brak wyników</p>";
            }           
            
        });
    }

    var attachCategoryDetailedStats = function(){

        var statsYearCategory = document.getElementsByClassName("statsYearCategory");
        Array.prototype.forEach.call(statsYearCategory, function(el){
            el.addEventListener("click", function(e){
                var miesiac = e.target.parentNode.dataset.miesiac;
                var kat = e.target.parentNode.dataset.miesiac;
                if(miesiac !== "13"){
                    showDetailedCategoryStats(miesiac, kat);
                }else{
                    console.log("kliknieto w podsumowanie");
                }
            })
        });
    }

    var showDetailedCategoryStats = function(miesiac, kat){
        var year = document.getElementById("selectYearCategory").value;
        var category = document.getElementById("selectCategory").value;
        var categoryName = getSelectedText("selectCategory");
        ajax.getData("POST", "./api/statsDetailed.php", {"year": year, "month":miesiac, "category":category}, function(dane){
            // console.log(dane);

            var detailedView = document.getElementById("detailedSummary");
            detailedView.innerHTML = prepareDetailedStatsView(dane, year, month[miesiac], categoryName);
            
        });
    }
    

    var prepareDetailedStatsView = function(dane, year, monthName, kat){

        var table = "<h5>Statystyki dla \""+ kat + "\" w " + monthName + " " + year + "</h5>";
        table += "<table class=\"teal lighten-5\"><thead><tr><th>Nazwa</th><th>Kwota</th><th>Data</th></tr></thead>";
        table += "<tbody>";

        dane.forEach(function(item){
            table += "<tr onclick=\"document.location="+"'/outcomes/"+item.id_wydatku+"/edit'"+"\">";
            table += "<td>"+item.nazwa_wydatku+"</td>";
            table += "<td>"+item.kwota+" "+item.waluta+"</td>";
            table += "<td>"+item.data_wydatku+"</td>";
            table += "</tr>";
        });        
        
        table += "</tbody></table>";

        return table;
    }   

    var prepareCategorySummary = function(dane){
        var res = [];

        var sumEUR = 0; 
        var sumPLN = 0;

        for(var i = 0; i<dane.length; i++){
            var temp = {};

            var key = dane[i].miesiac;

            if(res.length == 0){
                temp["miesiac"] =key;
                if(dane[i].waluta === "EUR"){
                    temp["EUR"] = dane[i].total;
                    temp["PLN"] = "0.00";

                    sumEUR += Number(dane[i].total);
                }else {
                    temp["EUR"] = "0.00";
                    temp["PLN"] = dane[i].total;

                    sumPLN += Number(dane[i].total);
                }
            }else{
                var idx = findIndexCategory(res, key);
                if(idx != -1){
                    var wal = dane[i].waluta;
                    if(res[idx][wal] === "0.00"){
                        res[idx][wal] = dane[i].total;
                    }

                    if(dane[i].waluta === "EUR"){
                        sumEUR += Number(dane[i].total);
                    }else{
                        sumPLN += Numner(dane[i].total);
                    }
                }else{
                    temp["miesiac"] =key;
                    if(dane[i].waluta === "EUR"){
                        temp["EUR"] = dane[i].total;
                        temp["PLN"] = "0.00";

                        sumEUR += Number(dane[i].total);
                    }else{
                        temp["EUR"] = "0.00";
                        temp["PLN"] = dane[i].total;

                        sumPLN += Number(dane[i].total); 
                    }
                }
            }
            if(temp.miesiac !== undefined){
                res.push(temp);
            }
        }

        res.push({"miesiac" : "13",
                    "EUR" : sumEUR.toFixed(2),
                    "PLN" : sumPLN.toFixed(2)
        });

        return res;
    }
    
    var prepareCategoryTable = function(dane, year, category){

        var table = "<table><thead><tr><th>Miesiąc</th><th>EUR</th><th>PLN</th></tr></thead><tbody>";
        dane.forEach(function(item){
            table += "<tr class=\"statsYearCategory\"data-idKategoria=\""+category+"\"data-miesiac=\""+item.miesiac+"\"><td>"+month[item.miesiac]+"</td><td>"+item.EUR+"</td><td>"+item.PLN+"</td>";           
            
            table += "</tr>";
        })
        
        table += "</tbody></table>";
        
        return table;
    }

    var prepareSummary = function(dane){
        var res = [];

        var sumEUR = 0;
        var sumPLN = 0;
                    
        for(i=0; i<dane.length; i++){
            var temp = {};
                        
            var key = dane[i].category_name;

            if(res.length == 0){                            
                temp["kategoria"] = key;
                temp["id_kategorii"] = dane[i].id_kategorii;

                if(dane[i].waluta === "EUR"){
                    temp["EUR"] = dane[i].total;
                    temp["PLN"] = "0.00";

                    sumEUR += Number(dane[i].total);

                }else{
                    temp["EUR"] = "0.00";
                    temp["PLN"] = dane[i].total;

                    sumPLN += Number(dane[i].total);
                }

            }else{
                var idx = findIndex(res, key);

                if( idx != -1){
                    var wal = dane[i].waluta;
                    temp["id_kategorii"] = dane[i].id_kategorii;
                    
                    if(res[idx][wal] === "0.00"){
                        res[idx][wal] = dane[i].total;
                    }

                    if(dane[i].waluta === "EUR"){
                        sumEUR += Number(dane[i].total);
                    }else{
                        sumPLN += Number(dane[i].total);
                    }
                    
                }else{
                    temp["kategoria"] = key;
                    temp["id_kategorii"] = dane[i].id_kategorii;
                    
                    if(dane[i].waluta === "EUR"){
                        temp["EUR"] = dane[i].total;
                        temp["PLN"] = "0.00";

                        sumEUR += Number(dane[i].total);                      

                    }else{
                        temp["EUR"] = "0.00";
                        temp["PLN"] = dane[i].total;

                        sumPLN += Number(dane[i].total);                        
                    }
                }   
                                         
            }
            if(temp.kategoria !== undefined){
                res.push(temp);
            }
        }

        res.push({"kategoria" : "Podsumowanie",
                    "EUR" : sumEUR.toFixed(2),
                    "PLN" : sumPLN.toFixed(2)
        });

        return res;
    }

    var prepareTable = function(dane){

        var table = "<table><thead><tr><th>Kategoria</th><th>EUR</th><th>PLN</th></tr></thead><tbody>";

        dane.forEach(function(item){
            table += "<tr class=\"statsYearMonth\" data-idKategoria=\"" +item.id_kategorii + "\" data-kategoria=\""+item.kategoria+ "\"><td>"+item.kategoria+"</td><td>"+item.EUR+"</td><td>"+item.PLN+"</td>";           
          
            table += "</tr>";
        })

        table += "</tbody></table>";

        return table;
    }

    var findIndex = function(res, key){
        var idx = -1;

        for(var i = 0; i<res.length; i++){
            if(res[i].kategoria === key){
                idx = i;
            }
        }
        return idx;
    }

    var findIndexCategory = function(res, key){
        var idx = -1;
    
        for(var i = 0; i<res.length; i++){
            if(res[i].miesiac === key){
                idx = i;
            }
        }
        return idx;
    }

    var getSelectedText = function(elementId) {
        var elt = document.getElementById(elementId);
    
        if (elt.selectedIndex == -1)
            return null;
    
        return elt.options[elt.selectedIndex].text;
    }
   

})();