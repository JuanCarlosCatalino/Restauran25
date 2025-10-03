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
    
    public function listarTokens(){
        $respuesta = array();
        $sql = $this->conexion->query(
            "SELECT t.id, c.razon_social, t.token, t.fecha_registro, t.estado
             FROM tokens_api t
             INNER JOIN client_api c ON t.id_client_api = c.id
             ORDER BY t.id DESC"
        );
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }
}
?>