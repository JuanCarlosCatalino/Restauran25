document.addEventListener('DOMContentLoaded', function(){
    listarTokens();
    cargarClientes();
});

// Cargar clientes para el select
async function cargarClientes() {
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let respu = await fetch(base_url_server+'src/control/ClienteController.php?tipo=listarClientes',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respu.json();
        if(json.status){
            let select = document.getElementById('id_client_api');
            select.innerHTML = '<option value="">-- Selecciona un cliente --</option>';
            
            json.contenido.forEach(cliente => {
                let option = document.createElement('option');
                option.value = cliente.id;
                option.textContent = `${cliente.razon_social} (RUC: ${cliente.ruc})`;
                select.appendChild(option);
            });
        }
    } catch (e) {
        console.log('error cargarClientes -- ' + e); 
    }
}

async function listarTokens() {
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let respu = await fetch(base_url_server+'src/control/TokenController.php?tipo=listarTokens',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respu.json();
        if(json.status){
            let datos = json.contenido;
            let tbody = document.querySelector("#tabla_tokens tbody");
            tbody.innerHTML = "";
            
            datos.forEach(item => {
                tbody.innerHTML += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.razon_social}</td>
                        <td><code>${item.token}</code></td>
                        <td>${item.fecha_registro}</td>
                        <td><span class="badge ${item.estado == 1 ? 'bg-success' : 'bg-danger'}">${item.estado == 1 ? "Activo" : "Inactivo"}</span></td>
                        <td>${item.options}</td>
                    </tr>
                `;
            });
        }
    } catch (e) {
        console.log('error listarTokens -- ' + e); 
    }
}

async function generarToken() {
    try {
        let datos = new FormData(frm_new_token);
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let respuesta = await fetch(base_url_server+'src/control/TokenController.php?tipo=generarToken',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if(json.status){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: json.mensaje,
                html: `Token generado: <br><strong><code>${json.token}</code></strong>`,
                showConfirmButton: true,
                confirmButtonText: 'Copiar Token',
                showCancelButton: true,
                cancelButtonText: 'Cerrar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Copiar token al portapapeles
                    navigator.clipboard.writeText(json.token);
                    Swal.fire('Copiado!', 'Token copiado al portapapeles', 'success');
                }
            });
            
            // Cerrar modal y limpiar formulario
            $('#tokenModal').modal('hide');
            document.getElementById('frm_new_token').reset();
            listarTokens();
        }else{
            Swal.fire({
                icon: "error",
                title: json.mensaje,
                showConfirmButton: false,
                timer: 1500
            });
        }
    } catch (e) {
        console.log("error generarToken -- " + e);
    }   
}