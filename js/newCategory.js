var newCategory = (function(){

    document.addEventListener("DOMContentLoaded", function(){

        var addButton = document.getElementById('add');

        addButton.addEventListener("click", function(e){

            if(validation.checkFields() != true){
                
                e.preventDefault();
            }
        });
    });

})();