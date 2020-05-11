var ajax = (function(){

    var dane = {};

    var getData = function(method, url, data, callback){

        var xhr = new XMLHttpRequest();

        switch (method){
            case "POST":
                // console.log(method);
                xhr.open(method, url, true); 
                xhr.setRequestHeader('Content-type', 'application/json');
                xhr.send(JSON.stringify(data));
            break;

            case "GET":
                // console.log(method);
                xhr.open("GET", url, true);
                xhr.send();
            break;

            case "PUT":
                // console.log(method);
                xhr.open(method, url, true);
                xhr.setRequestHeader('Content-type', 'application/json');
                xhr.send(JSON.stringify(data));
            break;

            default:
                // console.log("Zły parametr method");
            break;
        }

        xhr.onload = function(){
            if(xhr.status === 200){
                callback(JSON.parse(xhr.responseText));
            }
        }

    }

    return {
        getData : getData
    }

})();