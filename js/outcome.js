var outcomes = (function(){

    document.addEventListener("DOMContentLoaded", function(){

        var selectMonth = document.getElementById('selectMonth');
        var selectMonthInit = M.FormSelect.init(selectMonth);

        var selectYear = document.getElementById('selectYear');
        var selectYearInit = M.FormSelect.init(selectYear);
       
        var categorySelect = document.getElementById('categorySelect');
        var categorySelectInit = M.FormSelect.init(categorySelect);
        
        var currencySelect = document.getElementById('currencySelect');
        var currencySelectInit = M.FormSelect.init(currencySelect);

        var datePicker = document.getElementsByClassName('datepicker')[0];

        var options = {
            "format": 'yyyy-mm-dd',
            "firstDay": '1',
            // "defaultDate": new Date(setDate()),
            "setDefaultDate": 'true',
            "autoClose": 'true'
        };
        var datePickerInstances = M.Datepicker.init(datePicker, options);        

        var addButton = document.getElementById('add-outcome');
        
        addButton.addEventListener("click", function(e){

            if(validation.checkFields() != true){
                e.preventDefault();
            }
        });
    })   

})();