<?php

class Materialize{

    protected static $properties = [];
    protected static $init = "";

    public static function attach($HTMLelement, $component, $options = null){        
       
        self::$properties[] = [
            'html'          => $HTMLelement,
            'materialize'   => $component,
            'options'       => isset($options) ? self::buildOptions($options) : '{}'
        ];       
    }


    // var options = {
//     "format": "yyyy-mm-dd",
//     "firstDay": 1,
//     "defaultDate" : new Date(),
//     "setDefaultDate": true          
// };

    private static function buildOptions($options){
        $opt = '{';
        foreach ($options as $option => $value) {
            if($value !== 'yyyy-mm-dd'){
            
                $opt .= "'".$option."': "."".$value.",";
            }else {
                $opt .= "'".$option."': "."'".$value."',";
            }
        }

        $opt = substr($opt, 0, strlen($opt) - 1);
        $opt .= '}';
        // var_dump($opt);die();
        return $opt;
    }

    private static function getFormSelect($property){        
       
        $res = "var ". $property['html']." = document.getElementById('".$property['html']."');"."\r\n";
        $res .= "var ". $property['html']."Instance = M.".$property['materialize'].".init(".$property['html'].", ".$property['options'].");"."\r\n";

        return $res;        
    }

    private static function getDatePicker($property){
        $res = "var ".$property['html']." = document.getElementsByClassName('".$property['html']."')[0];"."\r\n";
        $res .= "var ".$property['html']."Instance = M.".$property['materialize'].".init(".$property['html'].", ".$property['options'].");"."\r\n";

        return $res;
    }
    
    public static function init(){

        foreach(self::$properties as $property){

            switch ($property['materialize']) {
                case 'FormSelect':
                    self::$init .= self::getFormSelect($property);
                break;

                case 'Datepicker':
                    self::$init .= self::getDatePicker($property);
                break;
                
                default:
                    # code...
                    break;
            }
        }

        return self::$init;
    }
}

