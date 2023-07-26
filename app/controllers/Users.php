<?php

require dirname(__DIR__, 1).'/models/UsersModel.php';

class Users{
    
    public function __construct() {
        session_status() === PHP_SESSION_ACTIVE ?: session_start();
    }
    
    public function login () : object{
        $email = $_POST['email'];
        $password = $_POST['password'];

        $auth = new UsersModel();
        $user = $auth->Verify($email);


        if($user !== NULL){
            if(password_verify($password, $user->password)){
                $_SESSION['user_logged_in'] = $user->user_id;
                $_SESSION['user_id']        = $user->user_id;
                $_SESSION['email']          = $user->email;
                $_SESSION['first_name']     = $user->first_name;
                $_SESSION['last_name']      = $user->last_name;
                $_SESSION['middle_name']    = $user->middle_name;
                
                jsonResponse ((object) [
                    'status_code' => 200,
                    'msg' => 'Logged In',
                    'success' => true
                ]);
            }else{
                jsonResponse((object) [
                    'status_code' => 401,
                    'msg' => 'Incorrect password',
                    'success' => false
                ]);
            }
        }else{
            jsonResponse((object) [
                'status_code' => 204,
                'msg' => 'User Email Not Found',
                'success' => false
            ]);
        }
    }

    public function register() : object {
        // Get form data from request body and validate it.
        $data = array(
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'password_confirm' => $_POST['password_confirm'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'middle_name' => $_POST['middle_name']
        );

        if($data['password'] === $data['password_confirm']){
            // verify if all fields are filled
            foreach($data as $user_data){
                if(empty($user_data)){
                    jsonResponse((object) [
                        'status_code' => 400,
                        'success'=>false,
                        "message"=> "Required fields are empty."
                    ]);
                }
            }

            unset($data['password_confirm']); //remove password confirm
            $columns = array_keys($data);
            $values = array_values($data);

            $user = new UsersModel();
            $new_user = $user->insert($columns,$values);
            
            jsonResponse ((object) [
                'status_code' => 200,
                'msg' => 'Registration Successful',
                'success' => $new_user
            ]);
        }else{
            jsonResponse((object) [
                'status_code' => 400,
                'success'=>false,
                "message"=> "Password does not match"
            ]);
        }

    }

    public function logout(){
        session_destroy();
    }
}