<?php
$tipo = $_GET['tipo'];
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/ClienteModel.php');
require_once('../model/adminModel.php');

//instanciar la clase cliente model
$objSesion = new SessionModel();
$objCliente = new ClienteModel();
$objAdmin = new AdminModel();

//variables de sesion
$id_sesion = $_REQUEST['sesion'];
$token = $_REQUEST['token'];

if($tipo == "registrarCliente"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
     if($_POST){
      $ruc = trim($_POST['ruc']);
      $razon_social = $_POST['razon_social'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      
      if($ruc == "" || $razon_social == "" || $telefono == "" || $correo == ""){
         $arr_Respuesta = array('status'=> false, 'mensaje'=>'Datos vacios');
      }else{
        $id_new_cliente = $objCliente->registrarCliente($ruc, $razon_social, $telefono, $correo);
        if($id_new_cliente > 0){
             $arr_Respuesta = array('status'=> true, 'mensaje'=>'Cliente registrado correctamente');
        }else{
             $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error Registrar cliente');
        }
      }
     }
   }
 echo json_encode($arr_Respuesta);
}

if($tipo == "listarClientes"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
    $arrClientes = $objCliente->listarClientes();
    if(count($arrClientes) > 0){
      for ($i=0; $i < count($arrClientes); $i++) { 
        $id_cliente = $arrClientes[$i]->id;
        $opciones = '<button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                     <a href="token?data='.$id_cliente.'"><button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-key"></i> Tokens</button></a>';
        $arrClientes[$i]->options = $opciones;
      }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'ok';
        $arr_Respuesta['contenido'] = $arrClientes;
    }else{
        $arr_Respuesta = array('status'=> false, 'mensaje'=>'No hay clientes registrados');
    }
   }
   echo json_encode($arr_Respuesta);
}
?>