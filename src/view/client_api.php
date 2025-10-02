<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes API</title>
    <!-- Incluye Bootstrap u otros estilos que estés usando -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { padding: 20px; }
        .form-container { margin-bottom: 30px; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">Gestión de Clientes API</h1>

        <!-- Formulario para Crear/Editar -->
        <div class="form-container">
            <h2 id="form-title">Crear Nueva Asignación Cliente API</h2>
            <form id="clientApiForm">
                <input type="hidden" id="clientApiId" name="idClient_api">

                <div class="form-group">
                    <label for="clientId">Cliente:</label>
                    <select class="form-control" id="clientId" name="Client_idClient" required>
                        <!-- Opciones cargadas por JS -->
                        <option value="">Cargando Clientes...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="apiId">API:</label>
                    <select class="form-control" id="apiId" name="Api_idApi" required>
                        <!-- Opciones cargadas por JS -->
                        <option value="">Cargando APIs...</option>
                    </select>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="active" name="active">
                    <label class="form-check-label" for="active">Activo</label>
                </div>

                <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
                <button type="button" class="btn btn-secondary" id="cancelButton" style="display:none;">Cancelar Edición</button>
            </form>
        </div>

        <!-- Tabla de Registros -->
        <h2>Listado de Asignaciones Cliente API</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>API</th>
                        <th>Activo</th>
                        <th>Fecha Creación</th>
                        <th>Fecha Actualización</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="clientApiTableBody">
                    <!-- Datos cargados por JS -->
                    <tr><td colspan="7">Cargando datos...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script de Bootstrap (si lo usas) y nuestro script JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Nuestro archivo JavaScript para la lógica CRUD -->
    <script src="../views/js/client_api_crud.js"></script> <!-- Ajusta esta ruta si es necesario -->
</body>
</html>