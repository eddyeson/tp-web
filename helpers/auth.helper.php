<?php

class AuthHelper {
    
    public function __construct(){ 
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
         }
    }
   
    
    function checkLoggedIn(){
        if(!empty($_SESSION['USER_ID'])){
            return true;
        }else{
            header("Location: " . BASE_URL); 
            return false;
        }    
    }
    
    public function login ($user){
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_ADMIN']=true;
    }
    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL);
    }
}