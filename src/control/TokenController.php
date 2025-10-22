<?php
$tipo = $_GET['tipo'];
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/TokenModel.php');
require_once('../model/ClienteModel.php');
require_once('../model/adminModel.php');

//instanciar las clases
$objSesion = new SessionModel();
$objToken = new TokenModel();
$objCliente = new ClienteModel();
$objAdmin = new AdminModel();

//variables de sesion
$id_sesion = $_REQUEST['sesion'];
$token = $_REQUEST['token'];

if($tipo == "generarToken"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
     if($_POST){
      $id_client_api = trim($_POST['data']);
      if($id_client_api == ""){
         $arr_Respuesta = array('status'=> false, 'mensaje'=>'Indicar cliente');
      }else{
        $token_generado = bin2hex(random_bytes(32));
       $fechaActual = date('Ymd');
       $token_final = $token_generado.'-'.$fechaActual.'-'.$id_client_api;

        $id_new_token = $objToken->generarToken($id_client_api, $token_final);
        if($id_new_token > 0){
             $arr_Respuesta = array('status'=> true, 'mensaje'=>'Token generado correctamente', 'token' => $token_generado);
        }else{
             $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error al generar token');
        }
      }
     }
   }
 echo json_encode($arr_Respuesta);
}

if($tipo == "listarTokens"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
    $id_cliente = isset($_POST['data']) ? intval($_POST['data']) : 0;
    $arrTokens = $objToken->listarTokens($id_cliente);
    if(count($arrTokens) > 0){
      for ($i=0; $i < count($arrTokens); $i++) { 
        $id_token = $arrTokens[$i]->id;
        $opciones = '<button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                     <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Borrar</button>';
        $arrTokens[$i]->options = $opciones;
      }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'ok';
        $arr_Respuesta['contenido'] = $arrTokens;
    }else{
        $arr_Respuesta = array('status'=> false, 'mensaje'=>'No hay tokens registrados');
    }
   }
   echo json_encode($arr_Respuesta);
}
?>