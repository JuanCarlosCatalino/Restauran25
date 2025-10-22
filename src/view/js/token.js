document.addEventListener('DOMContentLoaded', function(){
    listarTokens();
});

// Cargar clientes para el select
/* async function cargarClientes() {
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
} */

    //listar tokens de un cliente específico
async function listarTokens() {
    let tbody = document.querySelector("#tbodyTokens");
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        datos.append('data', data);
        let respu = await fetch(base_url_server+'src/control/TokenController.php?tipo=listarTokens',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respu.json();
        if(json.status){
            let datos = json.contenido;
            tbody.innerHTML = "";
            let count = 0;
            count++;
            datos.forEach(item => {
                tbody.innerHTML += `
                    <tr>
                        <td>${count}</td>
                        <td><code>${item.token}</code></td>
                        <td>${item.fecha_registro}</td>
                        <td><span class="badge ${item.estado == 1 ? 'bg-success' : 'bg-danger'}">${item.estado == 1 ? "Activo" : "Inactivo"}</span></td>
                        <td>${item.options}</td>
                    </tr>
                `;
            });
        }else{
            tbody.innerHTML = `<tr><td colspan="5" class="text-center">${json.mensaje}</td></tr>`;
        }
    } catch (e) {
        console.log('error listarTokens -- ' + e); 
    }
}

function PostgenerarToken(){
    Swal.fire({
        title: "Seguro que quieres generar token?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Si, Generar Token",
        denyButtonText: `No, cancelar`
        }).then((result) => {

        if (result.isConfirmed) {
            generarToken();
        } else if (result.isDenied) {
            Swal.fire("Cancelado", "", "error");
        }
        });
}

//generar token para un cliente específico
async function generarToken() {
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        datos.append('data', data);
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