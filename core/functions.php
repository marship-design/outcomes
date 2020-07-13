<?php

function currentUser(){
    return UsersModel::currentLoggedInUser();
}

function isLoggedIn(){
    return Session::exist(CURRENT_USER_SESSION_NAME);
}

function dd($data){
    echo '<pre>';
    die(var_dump($data));
    echo '</pre>';
};

function activeLink($url){

    if(strstr($_SERVER['REQUEST_URI'], $url) != ''){
        return "teal darken-2";
    }else{
        return "";
    }

}

function getCountry(){
    
    $ip = $_SERVER['REMOTE_ADDR'];
    $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip), true);
    
    $country_code = $dataArray["geoplugin_countryCode"];

    $code = "DE";
    if(!($country_code !== "DE" && $country_code !== "PL")) $code = $country_code;

    return $code;
}
// 

// function categoryStatsResult($results) {

//     $table = "<table><thead><tr><th>Miesiąc</th><th>EUR</th><th>PLN</th></tr></thead><tbody>";

//     foreach($results as $result){
//         $table += "<tr class=\"statsYearCategory\"data-idKategoria=\""+$result->id_kategorii+"\"data-miesiac=\""+$result->miesiac+"\"><td>"+"month[item.miesiac]"+"</td><td>"+$result->EUR+"</td><td>"+$result->PLN+"</td>";           
//         $table += "</tr>";
//     }
//     $table += "</tbody></table>";
    // dane.forEach(function(item){
    //     table += "<tr class=\"statsYearCategory\"data-idKategoria=\""+category+"\"data-miesiac=\""+item.miesiac+"\"><td>"+month[item.miesiac]+"</td><td>"+item.EUR+"</td><td>"+item.PLN+"</td>";           
        
    //     table += "</tr>";
    // })
    
    
    
//     return $table;
// }