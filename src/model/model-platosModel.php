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

        public function registrarPlato($id_restaurante,$nombre,$descripcion,$precio,$categoria){
        $sql = $this->conexion->query("INSERT INTO platos (id_restaurante,nombre, precio, descripcion, categoria) VALUES ('$id_restaurante','$nombre','$precio','$descripcion','$categoria')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function listarPlatosByRestaurante($id_restaurante){
        $respuesta = array();
        $sql = $this->conexion->query("SELECT * FROM platos WHERE id_restaurante = '$id_restaurante'");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}

?>