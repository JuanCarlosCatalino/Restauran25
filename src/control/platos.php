<?php
$tipo = $_GET['tipo'];
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/model-platosModel.php');
require_once('../model/adminModel.php');

//instanciar la clase categoria model
$objSesion = new SessionModel();
$objPlato = new PlatosModel();
$objAdmin = new AdminModel();

//variables de sesion
$id_sesion = $_REQUEST['sesion'];
$token = $_REQUEST['token'];

if($tipo == "registrarPlato"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
     if($_POST){
      $id_restaurante = trim($_POST['data']);
      $nombre = trim($_POST['nombrePlato']);
      $descripcion = $_POST['descripcionPlato'];
      $precio = $_POST['precioPlato'];
      if($nombre == "" || $descripcion  == ""|| $precio == ""){
         $arr_Respuesta = array('status'=> false, 'mensaje'=>'Datos vacios');
      }else{
        $id_new_plato = $objPlato->registrarPlato($id_restaurante,$nombre,$descripcion,$precio);
        if($id_new_plato > 0){
             $arr_Respuesta = array('status'=> true, 'mensaje'=>'registrado correctamente');
        }else{
             $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error Registrar restaurante');
        }
      }
     }
   }
 echo json_encode($arr_Respuesta);
}

if($tipo == "listarPlatos"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
    $id_restaurante = trim($_POST['data']);
    $arrPlatos = $objPlato->listarPlatosByRestaurante($id_restaurante);
    if($arrPlatos){
      for ($i=0; $i < count($arrPlatos); $i++) { 
        $id_platos = $arrPlatos[$i]->id;
        $opciones = '<div class="btn-group" role="group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </div>';
        $arrPlatos[$i]->options = $opciones;
      }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'ok';
        $arr_Respuesta['contenido'] = $arrPlatos;
    }

   }
   echo json_encode($arr_Respuesta);
}