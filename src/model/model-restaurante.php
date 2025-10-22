<?php
require_once "../library/conexion.php";

class RestauranteModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarRestaurante($nombre,$ubicacion,$descripcion,$telefono,$correo,$horario){
        $sql = $this->conexion->query("INSERT INTO restaurantes (nombre, ubicacion,descripcion, telefono, email, horario) VALUES ('$nombre','$ubicacion','$descripcion','$telefono','$correo','$horario')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function listarRestaurantes(){
        $respuesta = array();
        $sql = $this->conexion->query("SELECT * FROM restaurantes");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}

?>