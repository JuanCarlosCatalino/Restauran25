<?php

require_once('../model/apiModel.php');

$objApi = new ApiModel();
$tipo = $_GET['tipo'];

$token = $_POST['token'] ?? '';

$tokenn = explode("-",$token);

if(count($tokenn) != 3 || $tokenn[2] =='' ){
    echo json_encode(array(
        'status' => false,
        'mensaje' => 'Token inválido',
        'contenido' => array()
    ));
    exit;
}
//validar cliente
$arrCliente = $objApi->validarCliente($tokenn[2]);
if(!$arrCliente){
    echo json_encode(array(
        'status' => false,
        'mensaje' => 'Cliente no autorizado',
        'contenido' => array()
    ));
    exit;
}else{
//validar token
   $arrToken = $objApi->validarToken($token, $arrCliente->id);
   if(!$arrToken){
    echo json_encode(array(
        'status' => false,
        'mensaje' => 'Token inválido o expirado',
        'contenido' => array()
    ));
    exit;
} 
}

// Respuesta por defecto
$arr_Respuesta = array(
    'status' => false,
    'mensaje' => '',
    'contenido' => array()
);


if($tipo == "listarRestaurantes"){
    $arrRestaurantes = $objApi->listarRestaurantes();
    if($arrRestaurantes){
        for ($i=0; $i < count($arrRestaurantes); $i++) { 
            $id_restaurante = $arrRestaurantes[$i]->id;
            $opciones = ' <a href="platos?data='.$id_restaurante.'"><button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i> Ver</button></a>
                          <button type="button" class="btn btn-sm btn-outline-primary" onclick="editarRestaurante('.$id_restaurante.')"><i class="bi bi-pencil"></i> Editar</button>
                          <button type="button" class="btn btn-sm btn-outline-danger" onclick="eliminarRestaurante('.$id_restaurante.')"><i class="bi bi-trash"></i> Borrar</button>';
            $arrRestaurantes[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Restaurantes obtenidos correctamente';
        $arr_Respuesta['contenido'] = $arrRestaurantes;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron restaurantes';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Listar restaurantes con sus platos incluidos
 */
if($tipo == "listarRestaurantesConPlatos"){
    $arrRestaurantes = $objApi->listarRestaurantesConPlatos();
    if($arrRestaurantes){
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Restaurantes con platos obtenidos correctamente';
        $arr_Respuesta['contenido'] = $arrRestaurantes;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron restaurantes';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Obtener un restaurante específico con sus platos
 */
if($tipo == "obtenerRestauranteConPlatos"){
    $id_restaurante = $_REQUEST['id'];
    $restaurante = $objApi->obtenerRestauranteConPlatos($id_restaurante);
    
    if($restaurante){
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Restaurante obtenido correctamente';
        $arr_Respuesta['contenido'] = $restaurante;
    } else {
        $arr_Respuesta['mensaje'] = 'Restaurante no encontrado';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Buscar restaurantes por nombre
 */
if($tipo == "buscarRestaurante"){
    $termino = $_REQUEST['termino'];
    $arrRestaurantes = $objApi->buscarRestaurante($termino);
    
    if($arrRestaurantes){
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Búsqueda completada';
        $arr_Respuesta['contenido'] = $arrRestaurantes;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron resultados';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Buscar platos por nombre
 */
if($tipo == "buscarPlato"){
    $termino = $_REQUEST['termino'];
    $arrPlatos = $objApi->buscarPlato($termino);
    
    if($arrPlatos){
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Búsqueda completada';
        $arr_Respuesta['contenido'] = $arrPlatos;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron platos';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Búsqueda combinada: restaurante y plato
 */
if($tipo == "buscarRestaurantePorPlato"){
    $termino_restaurante = $_REQUEST['restaurante'];
    $termino_plato = $_REQUEST['plato'];
    $arrRestaurantes = $objApi->buscarRestaurantePorPlato($termino_restaurante, $termino_plato);
    
    if($arrRestaurantes){
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Búsqueda combinada completada';
        $arr_Respuesta['contenido'] = $arrRestaurantes;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron coincidencias';
    }
    echo json_encode($arr_Respuesta);
}

/**
 * Listar platos de un restaurante específico
 */
if($tipo == "listarPlatosPorRestaurante"){
    $id_restaurante = $_REQUEST['id'];
    $arrPlatos = $objApi->listarPlatosPorRestaurante($id_restaurante);
    
    if($arrPlatos){
        for ($i=0; $i < count($arrPlatos); $i++) { 
            $id_plato = $arrPlatos[$i]->id;
            $opciones = ' <button type="button" class="btn btn-sm btn-outline-primary" onclick="editarPlato('.$id_plato.')"><i class="bi bi-pencil"></i> Editar</button>
                          <button type="button" class="btn btn-sm btn-outline-danger" onclick="eliminarPlato('.$id_plato.')"><i class="bi bi-trash"></i> Borrar</button>';
            $arrPlatos[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['mensaje'] = 'Platos obtenidos correctamente';
        $arr_Respuesta['contenido'] = $arrPlatos;
    } else {
        $arr_Respuesta['mensaje'] = 'No se encontraron platos para este restaurante';
    }
    echo json_encode($arr_Respuesta);
}
?>