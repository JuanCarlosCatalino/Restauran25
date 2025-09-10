<?php
$tipo = $_GET['tipo'];
session_start();
require_once('../model/admin-sesionModel.php');
require_once('../model/model-restaurante.php');
require_once('../model/adminModel.php');

//instanciar la clase categoria model
$objSesion = new SessionModel();
$objRestaurante = new RestauranteModel();
$objAdmin = new AdminModel();

//variables de sesion
$id_sesion = $_REQUEST['sesion'];
$token = $_REQUEST['token'];

if($tipo == "registrarRestaurante"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
     if($_POST){
      $nombre = trim($_POST['nombreRestaurante']);
      $direccion = $_POST['direccionRestaurante'];
      $telefono = $_POST['telefonoRestaurante'];
      $horario = $_POST['horario'];
      $especialidad = $_POST['especialidad'];
      $calificacion = $_POST['calificacion'];
      if($nombre == "" || $direccion  == ""|| $telefono == "" || $horario == "" || $especialidad == "" ||$calificacion == ""){
         $arr_Respuesta = array('status'=> false, 'mensaje'=>'Datos vacios');
      }else{
        $id_new_restaurante = $objRestaurante->registrarRestaurante($nombre,$direccion,$telefono,$horario,$especialidad,$calificacion);
        if($id_new_restaurante > 0){
             $arr_Respuesta = array('status'=> true, 'mensaje'=>'registrado correctamente');
        }else{
             $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error Registrar restaurante');
        }
      }
     }
   }
 echo json_encode($arr_Respuesta);
}

if($tipo == "listarRestaurantes"){
    $arr_Respuesta = array('status'=> false, 'mensaje'=>'Error, sesion');
   if ($objSesion->verificar_sesion_si_activa($id_sesion, $token)) {
    $arrRestaurantes = $objRestaurante->listarRestaurantes();
    if($arrRestaurantes){
      for ($i=0; $i < count($arrRestaurantes); $i++) { 
        $id_restaurnte = $arrRestaurantes[$i]->id;
        $opciones = ' <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i> Ver</button>
                       <button type="button" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i> Editar</button>
                       <button type="button" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i> Borrar</button>';
        $arrRestaurantes[$i]->options = $opciones;
      }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'ok';
        $arr_Respuesta['contenido'] = $arrRestaurantes;
    }

   }
   echo json_encode($arr_Respuesta);
}