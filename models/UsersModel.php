<?php

class UsersModel extends Model {

    private $_isLoggedIn;

    public static $currentLoggedInUser = null;
   
  
    public $id_user = null;
        
    public function __construct($user = ''){
        parent::__construct();
        $table = 'users';

        $this->_sessionName = CURRENT_USER_SESSION_NAME;
        $this->_cookieName = REMEMBER_ME_COOKIE_NAME;
        $this->_expiry = REMEMBER_ME_COOKIE_EXPIRY;

        if($user != ''){
            if(is_int($user)){
               
                $u = $this->find($table, ['conditions' => 'id_user = ?', 'bind' => $user]);
            }

            if($u){
                $this->id_user = $u[0]->id_user;
               // var_dump($u[0]->id_user);
                // foreach ($u as $key => $val){
                //    echo $val->id_user;
                // }
            }
        }
    }
    

    public function findByEmail($email){

        // $query = 'SELECT * FROM users '.' WHERE email = ?';

        return $this->find('users', ['conditions' => 'email = ?', 'bind' => $email]);
    }

    public static function currentLoggedInUser(){

        if(!isset(self::$currentLoggedInUser) && Session::exist(CURRENT_USER_SESSION_NAME)){
            $u = new UsersModel((int)Session::get(CURRENT_USER_SESSION_NAME));
            // dd($u);
            self::$currentLoggedInUser = $u;
        }
        return self::$currentLoggedInUser;
    }

    public function login($remember = false){

        Session::set($this->_sessionName, $this->id_user);
        if($remember){
            $hash = md5(uniqid());// + rand(0, 50));
            $user_agent = Session::uagent_no_version();

            $params = ['session' => $hash, 'user_agent' => $user_agent, 'id_user' => $this->id_user];

            Cookie::set($this->_cookieName, $hash, $this->_expiry);

            $this->delete('user_sessions',['conditions' => 'id_user = ? AND user_agent = ?', 'bind' => [$this->id_user, $user_agent]]);
            $this->insert('user_sessions', $params);
        }
    }

    public function logout(){

        $user_agent = Session::uagent_no_version();
        $this->delete('user_sessions',['conditions' => 'id_user = ? AND user_agent = ?', 'bind' => [$this->id_user, $user_agent]]);
        Session::delete(CURRENT_USER_SESSION_NAME);
        if(Cookie::exist(REMEMBER_ME_COOKIE_NAME)){
            Cookie::delete(REMEMBER_ME_COOKIE_NAME);
           
        }
        self::$currentLoggedInUser = null;
        return true;
    }

    public static function loginUserFromCookie(){

        $userSession = UserSessions::getFromCookie();
// dd($userSession);
        if($userSession[0]->id_user != ''){
            $user = new self((int)$userSession[0]->id_user);
        }
        if($user){
            $user->login();
        }
        return $user;
    }

    
}