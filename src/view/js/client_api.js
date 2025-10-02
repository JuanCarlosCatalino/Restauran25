document.addEventListener('DOMContentLoaded', () => {
    // Definición de URLs de la API. **AJUSTA ESTAS URLs SEGÚN TU CONFIGURACIÓN**
    // Asumo que tu proyecto está directamente bajo el servidor web (ej: http://localhost/)
    const BASE_URL = 'http://localhost/Restauran25/'; // URL base de tu proyecto
    const API_CLIENT_API_BASE = BASE_URL + 'api/client_api/';
    const API_CLIENTES = BASE_URL + 'api/client/read.php'; // Asumo que tienes una API para leer clientes
    const API_APIS = BASE_URL + 'api/api/read.php';       // Asumo que tienes una API para leer APIs

    // Elementos del DOM
    const clientApiForm = document.getElementById('clientApiForm');
    const clientApiIdInput = document.getElementById('clientApiId');
    const clientIdSelect = document.getElementById('clientId');
    const apiIdSelect = document.getElementById('apiId');
    const activeCheckbox = document.getElementById('active');
    const submitButton = document.getElementById('submitButton');
    const cancelButton = document.getElementById('cancelButton');
    const formTitle = document.getElementById('form-title');
    const clientApiTableBody = document.getElementById('clientApiTableBody');

    let isEditing = false; // Estado para saber si estamos editando o creando

    // Función que se ejecuta cuando el DOM está completamente cargado
    (async function init() {
        await loadClients(); // Cargar la lista de clientes para el select
        await loadApis();    // Cargar la lista de APIs para el select
        await loadClientApis(); // Cargar la tabla principal
    })(); // Se invoca automáticamente

    // Cargar la lista de clientes desde la API
    async function loadClients() {
        try {
            const response = await fetch(API_CLIENTES);
            const data = await response.json();
            clientIdSelect.innerHTML = '<option value="">Seleccione un Cliente</option>'; // Opción por defecto
            if (data.records) {
                data.records.forEach(client => {
                    const option = document.createElement('option');
                    option.value = client.idClient;
                    option.textContent = client.name; // Asegúrate de que tu API de cliente devuelve 'name'
                    clientIdSelect.appendChild(option);
                });
            }
        } catch (error) {
            console.error('Error al cargar clientes:', error);
            clientIdSelect.innerHTML = '<option value="">Error al cargar clientes</option>';
        }
    }

    // Cargar la lista de APIs desde la API
    async function loadApis() {
        try {
            const response = await fetch(API_APIS);
            const data = await response.json();
            apiIdSelect.innerHTML = '<option value="">Seleccione una API</option>'; // Opción por defecto
            if (data.records) {
                data.records.forEach(api => {
                    const option = document.createElement('option');
                    option.value = api.idApi;
                    option.textContent = api.name; // Asegúrate de que tu API de API devuelve 'name'
                    apiIdSelect.appendChild(option);
                });
            }
        } catch (error) {
            console.error('Error al cargar APIs:', error);
            apiIdSelect.innerHTML = '<option value="">Error al cargar APIs</option>';
        }
    }

    // Cargar todas las asignaciones Client_api y mostrarlas en la tabla
    async function loadClientApis() {
        clientApiTableBody.innerHTML = '<tr><td colspan="7">Cargando datos...</td></tr>'; // Mensaje de carga
        try {
            const response = await fetch(API_CLIENT_API_BASE + 'read.php');
            const data = await response.json();

            clientApiTableBody.innerHTML = ''; // Limpiar la tabla antes de añadir nuevos datos
            if (data.records && data.records.length > 0) {
                data.records.forEach(item => {
                    const row = `
                        <tr>
                            <td>${item.idClient_api}</td>
                            <td>${item.client_name}</td>
                            <td>${item.api_name}</td>
                            <td>${item.active ? '<span class="badge badge-success">Sí</span>' : '<span class="badge badge-danger">No</span>'}</td>
                            <td>${item.date_create}</td>
                            <td>${item.date_update}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editClientApi(${item.idClient_api})">Editar</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteClientApi(${item.idClient_api})">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    clientApiTableBody.innerHTML += row;
                });
            } else {
                clientApiTableBody.innerHTML = '<tr><td colspan="7">No hay asignaciones Cliente API registradas.</td></tr>';
            }
        } catch (error) {
            console.error('Error al cargar asignaciones Cliente API:', error);
            clientApiTableBody.innerHTML = '<tr><td colspan="7" class="text-danger">Error al cargar los datos. Por favor, revise la consola para más detalles.</td></tr>';
        }
    }

    // Manejar el envío del formulario (Crear o Actualizar)
    clientApiForm.addEventListener('submit', async (e) => {
        e.preventDefault(); // Prevenir el envío tradicional del formulario

        const Client_idClient = clientIdSelect.value;
        const Api_idApi = apiIdSelect.value;
        const active = activeCheckbox.checked;

        // Validación básica
        if (!Client_idClient || !Api_idApi) {
            alert('Por favor, seleccione un Cliente y una API.');
            return;
        }

        const clientApiData = {
            Client_idClient: Client_idClient,
            Api_idApi: Api_idApi,
            active: active
        };

        let url = API_CLIENT_API_BASE + 'create.php';
        let method = 'POST';

        if (isEditing) {
            // Si estamos editando, agregamos el ID y cambiamos la URL/método
            clientApiData.idClient_api = clientApiIdInput.value;
            url = API_CLIENT_API_BASE + 'update.php';
            method = 'PUT'; // Se recomienda PUT para actualizaciones, si tu servidor lo soporta
        }

        try {
            const response = await fetch(url, {
                method: method,
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(clientApiData) // Convertir el objeto JS a JSON
            });

            const result = await response.json(); // Leer la respuesta JSON del servidor

            if (response.ok) { // Si el código de estado es 2xx
                alert(result.message);
                resetForm(); // Limpiar el formulario y resetear estado
                loadClientApis(); // Recargar la tabla para mostrar los cambios
            } else {
                // Manejar errores de la API (ej: 400 Bad Request, 503 Service Unavailable)
                alert('Error en la operación: ' + (result.message || 'Error desconocido'));
                console.error('API Error:', result);
            }
        } catch (error) {
            console.error('Error al enviar el formulario:', error);
            alert('Ocurrió un error de red o del servidor. Por favor, inténtelo de nuevo.');
        }
    });

    // Función global para editar (llamada desde el HTML)
    window.editClientApi = async function(id) {
        try {
            const response = await fetch(API_CLIENT_API_BASE + 'read_one.php?id=' + id);
            const item = await response.json();

            if (response.ok) {
                clientApiIdInput.value = item.idClient_api;
                clientIdSelect.value = item.Client_idClient;
                apiIdSelect.value = item.Api_idApi;
                activeCheckbox.checked = item.active;

                formTitle.textContent = 'Editar Asignación Cliente API';
                submitButton.textContent = 'Guardar Cambios';
                cancelButton.style.display = 'inline-block';
                isEditing = true;
            } else {
                alert('Error al cargar datos para edición: ' + (item.message || 'Error desconocido'));
                console.error('API Error:', item);
            }
        } catch (error) {
            console.error('Error al cargar para editar:', error);
            alert('Ocurrió un error al cargar los datos para editar.');
        }
    }

    // Función global para eliminar (llamada desde el HTML)
    window.deleteClientApi = async function(id) {
        if (!confirm('¿Está seguro de que desea eliminar esta asignación? Esta acción es irreversible.')) {
            return; // Si el usuario cancela, no hacemos nada
        }

        try {
            const response = await fetch(API_CLIENT_API_BASE + 'delete.php', {
                method: 'DELETE', // Se recomienda DELETE para eliminaciones
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ idClient_api: id }) // Enviamos el ID en el cuerpo
            });

            const result = await response.json();

            if (response.ok) {
                alert(result.message);
                loadClientApis(); // Recargar la tabla después de eliminar
            } else {
                alert('Error al eliminar: ' + (result.message || 'Error desconocido'));
                console.error('API Error:', result);
            }
        } catch (error) {
            console.error('Error al eliminar:', error);
            alert('Ocurrió un error al eliminar la asignación.');
        }
    }

    // Resetear el formulario y estado de edición
    cancelButton.addEventListener('click', resetForm);

    function resetForm() {
        clientApiForm.reset(); // Limpia los campos del formulario
        clientApiIdInput.value = '';
        isEditing = false;
        formTitle.textContent = 'Crear Nueva Asignación Cliente API';
        submitButton.textContent = 'Crear';
        cancelButton.style.display = 'none';
        // Volver a seleccionar la opción por defecto en los selects
        clientIdSelect.value = '';
        apiIdSelect.value = '';
    }
});