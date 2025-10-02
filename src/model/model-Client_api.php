<?php
// Asegúrate de incluir la conexión a la base de datos
require_once __DIR__ . '/../config/Conexion.php'; // Ajusta la ruta según sea necesario

class Client_api {
    public $idClient_api;
    public $Client_idClient;
    public $Api_idApi;
    public $active;
    public $date_create;
    public $date_update;

    private $conn;
    private $table_name = "Client_api";

    public function __construct() {
        $database = new Conexion();
        $this->conn = $database->conectar();
    }

    // Método para obtener todas las asignaciones Client_api
    // Incluye los datos del Cliente y de la API relacionada
    public function getAll() {
        $query = "SELECT 
                    ca.idClient_api, 
                    ca.Client_idClient, 
                    c.name as client_name, 
                    ca.Api_idApi, 
                    a.name as api_name, 
                    ca.active, 
                    ca.date_create, 
                    ca.date_update 
                  FROM " . $this->table_name . " ca
                  JOIN Cliente c ON ca.Client_idClient = c.idClient
                  JOIN Api a ON ca.Api_idApi = a.idApi
                  ORDER BY ca.date_create DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para obtener una asignación Client_api por su ID
    public function getById($id) {
        $query = "SELECT 
                    ca.idClient_api, 
                    ca.Client_idClient, 
                    c.name as client_name, 
                    ca.Api_idApi, 
                    a.name as api_name, 
                    ca.active, 
                    ca.date_create, 
                    ca.date_update 
                  FROM " . $this->table_name . " ca
                  JOIN Cliente c ON ca.Client_idClient = c.idClient
                  JOIN Api a ON ca.Api_idApi = a.idApi
                  WHERE ca.idClient_api = :idClient_api
                  LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":idClient_api", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $this->idClient_api = $row['idClient_api'];
            $this->Client_idClient = $row['Client_idClient'];
            $this->Api_idApi = $row['Api_idApi'];
            $this->active = $row['active'];
            $this->date_create = $row['date_create'];
            $this->date_update = $row['date_update'];
            $this->client_name = $row['client_name']; // Añadimos el nombre del cliente
            $this->api_name = $row['api_name'];     // Añadimos el nombre de la API
            return true;
        }
        return false;
    }

    // Método para crear una nueva asignación Client_api
    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                  SET
                    Client_idClient = :Client_idClient,
                    Api_idApi = :Api_idApi,
                    active = :active,
                    date_create = :date_create,
                    date_update = :date_update";

        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar los parámetros
        $this->Client_idClient = htmlspecialchars(strip_tags($this->Client_idClient));
        $this->Api_idApi = htmlspecialchars(strip_tags($this->Api_idApi));
        $this->active = filter_var($this->active, FILTER_VALIDATE_BOOLEAN) ? 1 : 0; // Convierte a 0 o 1
        $this->date_create = date('Y-m-d H:i:s');
        $this->date_update = date('Y-m-d H:i:s');

        $stmt->bindParam(":Client_idClient", $this->Client_idClient);
        $stmt->bindParam(":Api_idApi", $this->Api_idApi);
        $stmt->bindParam(":active", $this->active);
        $stmt->bindParam(":date_create", $this->date_create);
        $stmt->bindParam(":date_update", $this->date_update);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para actualizar una asignación Client_api existente
    public function update() {
        $query = "UPDATE " . $this->table_name . "
                  SET
                    Client_idClient = :Client_idClient,
                    Api_idApi = :Api_idApi,
                    active = :active,
                    date_update = :date_update
                  WHERE
                    idClient_api = :idClient_api";

        $stmt = $this->conn->prepare($query);

        // Limpiar y enlazar los parámetros
        $this->idClient_api = htmlspecialchars(strip_tags($this->idClient_api));
        $this->Client_idClient = htmlspecialchars(strip_tags($this->Client_idClient));
        $this->Api_idApi = htmlspecialchars(strip_tags($this->Api_idApi));
        $this->active = filter_var($this->active, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
        $this->date_update = date('Y-m-d H:i:s'); // Actualizar la fecha de modificación

        $stmt->bindParam(":idClient_api", $this->idClient_api);
        $stmt->bindParam(":Client_idClient", $this->Client_idClient);
        $stmt->bindParam(":Api_idApi", $this->Api_idApi);
        $stmt->bindParam(":active", $this->active);
        $stmt->bindParam(":date_update", $this->date_update);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método para eliminar una asignación Client_api
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE idClient_api = :idClient_api";
        $stmt = $this->conn->prepare($query);

        $this->idClient_api = htmlspecialchars(strip_tags($this->idClient_api));
        $stmt->bindParam(":idClient_api", $this->idClient_api);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>