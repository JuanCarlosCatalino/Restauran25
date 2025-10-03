<?php
require_once "../library/conexion.php";

class ClienteModel
{
    private $conexion;
    
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarCliente($ruc, $razon_social, $telefono, $correo){
        $sql = $this->conexion->query("INSERT INTO client_api (ruc, razon_social, telefono, correo) VALUES ('$ruc','$razon_social','$telefono','$correo')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    
    public function listarClientes(){
        $respuesta = array();
        $sql = $this->conexion->query("SELECT * FROM client_api");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}
?>