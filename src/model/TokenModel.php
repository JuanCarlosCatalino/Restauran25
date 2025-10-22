<?php
require_once "../library/conexion.php";

class TokenModel
{
    private $conexion;
    
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function generarToken($id_client_api, $token){
        $sql = $this->conexion->query("INSERT INTO tokens_api (id_client_api, token) VALUES ('$id_client_api','$token')");
        if ($sql) {
            $sql = $this->conexion->insert_id;
        } else {
            $sql = 0;
        }
        return $sql;
    }
    public function listarTokens($id_client_Api){
        $respuesta = array();
        $sql = $this->conexion->query(" SELECT * FROM tokens_api WHERE id_client_api = $id_client_Api ");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}
?>