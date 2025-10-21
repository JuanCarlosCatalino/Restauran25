<?php
// ApiModel.php
require_once "../library/conexion.php";

class ApiModel
{
    private $conexion;
    
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    /**
     * Listar todos los restaurantes (sin platos)
     * @return array Lista de restaurantes
     */
    public function listarRestaurantes(){
        $respuesta = array();
        $sql = $this->conexion->query("SELECT * FROM restaurantes ORDER BY nombre ASC");
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        return $respuesta;
    }

    /**
     * Listar todos los restaurantes con sus platos incluidos
     * @return array Lista de restaurantes con array de platos
     */
    public function listarRestaurantesConPlatos(){
        $respuesta = array();
        
        // Obtener todos los restaurantes
        $sql = $this->conexion->query("SELECT * FROM restaurantes ORDER BY nombre ASC");
        
        while ($restaurante = $sql->fetch_object()) {
            // Para cada restaurante, obtener sus platos
            $id_restaurante = $restaurante->id;
            $sql_platos = $this->conexion->query("SELECT * FROM platos WHERE id_restaurante = $id_restaurante ORDER BY nombre ASC");
            
            $platos = array();
            while ($plato = $sql_platos->fetch_object()) {
                array_push($platos, $plato);
            }
            
            // Agregar los platos al objeto restaurante
            $restaurante->platos = $platos;
            array_push($respuesta, $restaurante);
        }
        
        return $respuesta;
    }

    /**
     * Obtener un restaurante específico con sus platos
     * @param int $id_restaurante ID del restaurante
     * @return object|null Restaurante con sus platos o null
     */
    public function obtenerRestauranteConPlatos($id_restaurante){
        $id_restaurante = intval($id_restaurante);
        
        // Obtener información del restaurante
        $sql = $this->conexion->query("SELECT * FROM restaurantes WHERE id = $id_restaurante");
        $restaurante = $sql->fetch_object();
        
        if($restaurante){
            // Obtener los platos del restaurante
            $sql_platos = $this->conexion->query("SELECT * FROM platos WHERE id_restaurante = $id_restaurante ORDER BY nombre ASC");
            
            $platos = array();
            while ($plato = $sql_platos->fetch_object()) {
                array_push($platos, $plato);
            }
            
            $restaurante->platos = $platos;
            return $restaurante;
        }
        
        return null;
    }

    /**
     * Buscar restaurantes por nombre
     * @param string $termino Término de búsqueda
     * @return array Lista de restaurantes que coinciden
     */
    public function buscarRestaurante($termino){
        $respuesta = array();
        $termino = $this->conexion->real_escape_string($termino);
        
        $sql = $this->conexion->query("SELECT * FROM restaurantes 
                                       WHERE nombre LIKE '%$termino%' 
                                       OR ubicacion LIKE '%$termino%' 
                                       OR descripcion LIKE '%$termino%'
                                       ORDER BY nombre ASC");
        
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        
        return $respuesta;
    }

    /**
     * Buscar platos por nombre (incluye información del restaurante)
     * @param string $termino Término de búsqueda
     * @return array Lista de platos con información del restaurante
     */
    public function buscarPlato($termino){
        $respuesta = array();
        $termino = $this->conexion->real_escape_string($termino);
        
        $sql = $this->conexion->query("SELECT p.*, r.nombre as restaurante_nombre, r.ubicacion as restaurante_ubicacion
                                       FROM platos p
                                       INNER JOIN restaurantes r ON p.id_restaurante = r.id
                                       WHERE p.nombre LIKE '%$termino%' 
                                       OR p.descripcion LIKE '%$termino%'
                                       ORDER BY p.nombre ASC");
        
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        
        return $respuesta;
    }

    /**
     * Búsqueda combinada: restaurantes que coincidan con el nombre Y tengan el plato buscado
     * @param string $termino_restaurante Término para buscar restaurante
     * @param string $termino_plato Término para buscar plato
     * @return array Lista de restaurantes que cumplen ambas condiciones
     */
    public function buscarRestaurantePorPlato($termino_restaurante, $termino_plato){
        $respuesta = array();
        $termino_restaurante = $this->conexion->real_escape_string($termino_restaurante);
        $termino_plato = $this->conexion->real_escape_string($termino_plato);
        
        $sql = $this->conexion->query("SELECT DISTINCT r.*
                                       FROM restaurantes r
                                       INNER JOIN platos p ON r.id = p.id_restaurante
                                       WHERE r.nombre LIKE '%$termino_restaurante%'
                                       AND p.nombre LIKE '%$termino_plato%'
                                       ORDER BY r.nombre ASC");
        
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        
        return $respuesta;
    }

    /**
     * Listar platos de un restaurante específico
     * @param int $id_restaurante ID del restaurante
     * @return array Lista de platos del restaurante
     */
    public function listarPlatosPorRestaurante($id_restaurante){
        $respuesta = array();
        $id_restaurante = intval($id_restaurante);
        
        $sql = $this->conexion->query("SELECT * FROM platos 
                                       WHERE id_restaurante = $id_restaurante 
                                       ORDER BY nombre ASC");
        
        while ($objeto = $sql->fetch_object()) {
            array_push($respuesta, $objeto);
        }
        
        return $respuesta;
    }

    /**
     * Obtener estadísticas generales
     * @return object Objeto con estadísticas
     */
    public function obtenerEstadisticas(){
        $estadisticas = new stdClass();
        
        // Total de restaurantes
        $sql = $this->conexion->query("SELECT COUNT(*) as total FROM restaurantes");
        $resultado = $sql->fetch_object();
        $estadisticas->total_restaurantes = $resultado->total;
        
        // Total de platos
        $sql = $this->conexion->query("SELECT COUNT(*) as total FROM platos");
        $resultado = $sql->fetch_object();
        $estadisticas->total_platos = $resultado->total;
        
        // Precio promedio de platos
        $sql = $this->conexion->query("SELECT AVG(CAST(REPLACE(REPLACE(precio, '$', ''), ',', '') AS DECIMAL(10,2))) as promedio FROM platos");
        $resultado = $sql->fetch_object();
        $estadisticas->precio_promedio = number_format($resultado->promedio, 2);
        
        return $estadisticas;
    }
}
?>