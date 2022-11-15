<?php
class jugadoresModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabajo practica;charset=utf8', 'root', '');
    }
    function obtenerjugadoresModel(){
        $query = $this->db->prepare('SELECT * FROM jugador');
        $query -> execute();
        $jugador = $query->fetchAll(PDO::FETCH_OBJ);
        return $jugador;
        
    }
    function detallesDejugador($id){
        $query = $this->db->prepare('SELECT * FROM jugador WHERE id = ?');
        $query->execute([$id]);
        $jugadorDetail=$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($jugadorDetail as $detalle) {
            $query = $this->db->prepare('SELECT * FROM equipos WHERE id_equipos = ?');
            $query->execute([$detalle->id_equipo]);
            $equipo = $query->fetch(PDO::FETCH_OBJ);
            $detalle->id_equipo=$equipo->equipo;
        }
        return $jugadorDetail;
    }
    function jugadoreseneseteequipo($id){
        $query = $this->db->prepare('SELECT * FROM jugador WHERE id_equipo = ?');
        $query->execute([$id]);
        $equipjugador=$query->fetchAll(PDO::FETCH_OBJ);
        return $equipjugador;
    }
    function eliminarjugador($id){
        $query = $this->db->prepare("DELETE FROM jugador WHERE id = ?");
        $query->execute([$id]);
    }
    function agregarjugadoralaDB($nombre,$sensibilidad,$dpi,$rango,$equipo,$rol){
        $query = $this->db->prepare("INSERT INTO jugador(nombre, sensibilidad, dpi, rango, id_equipo, rol) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$nombre,$sensibilidad,$dpi,$rango,$equipo,$rol]);
        return $this->db->lastInsertId();
    }
   public function editarjugadordelaDB($data,$id){
        $query = $this->db->prepare("UPDATE  jugador SET nombre = ?,sensibilidad = ?, dpi = ?, rango = ?,id_equipo = ?, rol = ? WHERE id = ?");

        $query->execute(array($data->nombre,$data->sensibilidad,$data->dpi,$data->rango,$data->equipo,$data->rol,$id));
        
    }
}   