<?php

class UserSessions extends Model {
    
    public $table = 'user_sessions';

    public function __construct(){
        
        parent::__construct();
    }

    public static function getFromCookie(){

        $userSession = new self();

        if(Cookie::exist(REMEMBER_ME_COOKIE_NAME)){

            $userSession = $userSession->find('user_sessions', ['conditions' => 'user_agent = ? AND session = ?',
            'bind' => [Session::uagent_no_version(), Cookie::get(REMEMBER_ME_COOKIE_NAME)]]);
        }

        if(!$userSession) return false;
        
        return $userSession;
    }

}
