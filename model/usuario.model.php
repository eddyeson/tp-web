<?php

class UserModel{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabajo practica;charset=utf8', 'root', '');

    }

    public function conseguirUsuarioPorMail($email){
        $query= $this->db->prepare('SELECT * FROM usuarios WHERE mail = ?');
        $query->execute(array($email));
        $usuarioEmail =  $query->fetch(PDO::FETCH_OBJ);
       // var_dump($usuarioEmail);
        return $usuarioEmail;
    }
}