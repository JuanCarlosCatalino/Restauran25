<?php
require_once "../library/conexion.php";

class PlatosModel
{

    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

        public function registrarPlato($id_restaurante,$nombre,$descripcion,$precio){
        $sql = $this->conexion->query("INSERT INTO platos (nombre, precio, descripcion, restaurante_id) VALUES ('$nombre','$precio','$descripcion','$id_restaurante')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function listarPlatosByRestaurante($id_restaurante){
        $respuesta = array();
        $sql = $this->conexion->query("SELECT * FROM platos WHERE restaurante_id = '$id_restaurante'");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}

?>