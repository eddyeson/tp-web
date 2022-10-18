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
    function eliminarequipos($id){ 
        $query = $this->db->prepare("DELETE FROM equipos WHERE id_equipo = ?");
        $query->execute([$id]);
     }
    function agregarequipolaDB($equipo,$pais){
        $query = $this->db->prepare("INSERT INTO equipos(equipo, nacionalidad)"." VALUES (?, ?)");
        $query->execute(array($equipo,$pais));
        header("Location: " . BASE_URL);
    }
    function eliminarequipo($id){
        $query = $this->db->prepare("DELETE FROM equipos WHERE id_equipos = ?");
       try{   $query->execute([$id]);}
       catch(PDOException $ex){
        header("Location: " . BASE_URL);
       }
       header("Location: " . BASE_URL);
    }
    function editarequipodelaDB($data,$id){
        $query = $this->db->prepare("UPDATE  equipos SET equipo = ?, nacionalidad = ? WHERE id_equipos = ?");

      try{  $query->execute(array($data->equipo,$data->nacionalidad,$id));} 
      catch(PDOException $ex){
        header("Location: " . BASE_URL);
      }
     // header("Location: " . BASE_URL);
    }
}