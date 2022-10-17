<?php

require_once './model/usuario.model.php';
require_once './view/authView.php';

class AuthController{
    private $view;
    private $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }
    public function mostrarForm(){
        $this->view->mostrarForm();
    }
    public function validationUsers(){

        $email=$_POST['email'];
        $password = $_POST['password'];

        $user = $this->model->getUserByEmail($email);

        if($user && password_verify($password, $user->password)){

            session_start();
            $_SESSION['USER_ID'] = $user->id;
            $_SESSION['USER_EMAIL'] = $user->email;
            $_SESSION['IS_ADMIN']=true;
            header("Location: " . BASE_URL);

        }

        else{
            $this->view->mostrarForm("El usuario o la contraseña no existe.");
        }
    }
    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}