<?php

class LoginController {

    public function show(){

        $model = new LoginModel();



        // $db->find('users', [
        //     'conditions' => 'id_user = ?',
        //     'bind' => 1
        // ]);
        // $sql = "SELECT * FROM users";
        // $fields = [
        //     'user_name' => 'Sarcin'            
        // ];

        // $cos = $db->update('users', 1, $fields);
        // dd($cos);

        require 'views/login.view.php';

    //    echo password_hash('sss', PASSWORD_DEFAULT);
    //    dd($_SESSION);
    }

    public function loginAction(){
        
        $user = new UsersModel();
        $res = '';
        $validation = true;

        if($validation){

            $res = $user->findByEmail($_POST["email"]);
            if($res[0]->email && password_verify(Input::get('password'), $res[0]->password)){
                
                $remember = (isset($_POST['remember']) && Input::get('remember')) ? true : false;
                $user->id_user = $res[0]->id_user;
                // $user->login($remember, $res[0]->id_user);
                $user->login($remember);
               
                header('Location: '.PROJECT_FOLDER);
            }else{
                dd('not passed');
            }
        }
    }

    public function logoutAction(){

        currentUser()->logout();

        header('Location: '.PROJECT_FOLDER.'login');
        // dd($_SESSION);
    }
}