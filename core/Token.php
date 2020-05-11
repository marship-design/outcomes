<?php

class Token{

    public static function generate(){

        return Session::set(TOKEN_NAME, md5(uniqid()));
    }

    public static function check($token){

        $tokenName = TOKEN_NAME;
    
        if(Session::exist($tokenName) && $token === Session::get($tokenName)){
            Session::delete($tokenName);
            
            return true;
        }

        return false;
    }
}