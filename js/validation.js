var validation = (function(){

    var actionButton = document.getElementById("add-outcome");

    var getButtonAction = function(){
        
        return actionButton.getAttribute("data-action");
        // return actionButton.dataset.action;
    }

    var setButtonAction = function(action){

        actionButton.setAttribute("data-action", action);
    }
    
    var setElementBusy = function(element){
        
        var busy = document.getElementsByClassName(element)[0];
        busy.classList.add("elem-is-busy");
    }
    
    var setElementNotBusy = function(element){

        var busy = document.getElementsByClassName(element)[0];
        busy.classList.remove("elem-is-busy");
    }

    var clearCategoryFields = function(){

        document.getElementById("category").value = "";
    }

    var clearOutcomesFields = function(){

        var outcomeName = document.getElementById("outcomeName").value = "";
        //console.log("outcomeName ", outcomeName);

        var categoryID = document.getElementById("categorySelect");        
        //var selectedCategory = categoryID.value;
        //console.log("Wybrano kategorie: ", selectedCategory);

        var currency = document.getElementById("currencySelect");
       // var selectedCurrency = currency.value;
       // console.log("Wybrano walute: ", selectedCurrency);

       // var date = document.getElementsByClassName("datepicker")[0];
      //  var dateInstance = M.Datepicker.getInstance(date);
        //console.log("Wybrano date: ", dateInstance.toString());

        var kwota = document.getElementById("kwota").value = "";

        var tag = document.getElementById("tag").value = "";
    }

    var getFormFields = function(){
    
        var outcomeName = document.getElementById("outcomeName");
        //console.log("outcomeName ", outcomeName);

        var categoryID = document.getElementById("categorySelect");
        //var selectedCategory = categoryID.value;
        //console.log("Wybrano kategorie: ", selectedCategory);

        var currency = document.getElementById("currencySelect");
       // var selectedCurrency = currency.value;
       // console.log("Wybrano walute: ", selectedCurrency);

        var date = document.getElementsByClassName("datepicker")[0];
        var dateInstance = M.Datepicker.getInstance(date);
        //console.log("Wybrano date: ", dateInstance.toString());

        var kwota = document.getElementById("kwota");

        var tag = document.getElementById("tag");        
                
        return {
            "id_user": 1,
            "id_kategorii": categoryID.value,
            "kwota": kwota.value,
            "data_wydatku": dateInstance.toString(),
            "nazwa_wydatku": outcomeName.value,
            "tagi": tag.value,
            "waluta": currency.value
        }
    }

    var checkFields = function(){

        var isValid = true;

        var fields = document.getElementsByClassName("toCheck");

        Array.prototype.forEach.call(fields, function(el){

            if(el.id === "outcomeName"){
                if(!checkOutcomeName(el)){ isValid = false; }
            }

            if(el.id === "kwota"){
                if(!checkKwota(el)){ isValid = false; }
            }
            
            if(el.id === "categorySelect"){
                if(!checkCategory(el)){ isValid = false; }
            }

            if(el.id === "tag"){
                if(!checkTag(el)){ isValid = false; }
            }

            if(el.id === "category"){
                if(!checkOutcomeName(el)){ isValid = false; }
            }


            //console.log(el.id, el.value, isValid);
        });

        return isValid;
    }

    var checkTag = function(el){

       var pat = /^([a-zA-Z]+)(,\s?[a-zA-Z]*)*$/gi;
        // var tag = new RegExp("^([a-zA-Z]+)(,\s?[a-zA-Z]*)*$","gi");

        if(!pat.test(el.value)){
            showFieldValidation(el, false);
            return false;
        } else {
            showFieldValidation(el, true);
            return true;
        } 

    }

    var checkCategory = function(el){


        if(el.options[el.selectedIndex].value === "" || el.options[el.selectedIndex].value === "-1"){
            showFieldValidation(el.parentElement, false);
            return false;
        } else {
            showFieldValidation(el.parentElement, true);
            return true;
        }
        //console.log(el.options);//[el.selectedIndex].value);

    }

    var checkKwota = function(el){

        // var pat = /^\d+\.\d{1,2}$|^\d+$/;
        var price = new RegExp("^\\d+\\.\\d{1,2}$|^\\d+$","gi");

        if(!price.test(el.value)){
            showFieldValidation(el, false);
            return false;
        } else {
            showFieldValidation(el, true);
            return true;
        }        
    }

    var checkOutcomeName = function(el){

        var check = true;

        if(el.value === ""){
            check = false;
        }

        if(check){
            showFieldValidation(el, true);
            return true;
        } else {
            showFieldValidation(el, false);
            return false;
        }
    }

    var showFieldValidation = function(el, inputIsValid){

        if(!inputIsValid){
            //dodac blad
            el.nextElementSibling.nextElementSibling.style.display = "block";
            //console.log(el.nextElementSibling.nextElementSibling);
        } else {
            //zdjac blad
            el.nextElementSibling.nextElementSibling.style.display = "none";
        }
    }

   

    return {
        setElementBusy : setElementBusy,
        setElementNotBusy : setElementNotBusy,
        clearCategoryFields : clearCategoryFields,
        clearOutcomesFields : clearOutcomesFields,
        checkFields : checkFields,
        getButtonAction : getButtonAction,
        setButtonAction : setButtonAction,
        getFormFields : getFormFields
    }
    
})();