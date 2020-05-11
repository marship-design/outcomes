var outcomes = (function(){

    document.addEventListener("DOMContentLoaded", function(){

        var datePicker = document.getElementsByClassName('datepicker')[0];

        var options = {
            "format": 'yyyy-mm-dd',
            "firstDay": '1',
            "defaultDate": new Date(),
            "setDefaultDate": 'true',
            "autoClose": 'true'
        };
        var datePickerInstances = M.Datepicker.init(datePicker, options);

        var categorySelect = document.getElementById('categorySelect');
        var categorySelectInstance = M.FormSelect.init(categorySelect);
        
        var currencySelect = document.getElementById('currencySelect');
        var currencySelectInstance = M.FormSelect.init(currencySelect);        
        

        var addButton = document.getElementById('add-outcome');

        addButton.addEventListener("click", function(e){

            if(validation.checkFields() != true){
                e.preventDefault();
            }
        });
    })    

})();