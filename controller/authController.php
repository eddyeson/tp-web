<?php

require_once './model/usuario.model.php';
require_once './view/authView.php';
require_once './helpers/auth.helper.php';
class AuthController{
    private $view;
    private $model;
    private $helper;
    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AuthView();
        $this->helper = new AuthHelper();
    }
    public function mostrarForm(){
        $this->view->mostrarForm();
    }
    public function validationUsers(){

        $email=$_POST['email'];
        $password = $_POST['password'];
        $user = $this->model->getUserByEmail($email);

        if($user && password_verify($password, $user->password)){
            $this->helper->login($user);
            header("Location: " . BASE_URL);
        }
        else{
            $this->view->mostrarForm("El usuario o la contraseña no existe.");
        }
    }
    public function logout() {
        $this->helper->logout();
        header("Location: " . BASE_URL);
    }
}