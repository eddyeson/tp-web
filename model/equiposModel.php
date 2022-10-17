<?php
class equiposModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabajo practica;charset=utf8', 'root', '');
    }

    function obtenerequipo(){
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query -> execute();
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);
        //var_dump($equipos);
        return $equipos;
    }
}