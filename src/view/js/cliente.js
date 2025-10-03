document.addEventListener('DOMContentLoaded', function(){
    listarClientes();
});

async function listarClientes() {
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
            let datos = json.contenido;
            let tbody = document.querySelector("#tabla_clientes tbody");
            tbody.innerHTML = "";
            
            datos.forEach(item => {
                tbody.innerHTML += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.ruc}</td>
                        <td>${item.razon_social}</td>
                        <td>${item.telefono}</td>
                        <td>${item.correo}</td>
                        <td>${item.fecha_registro}</td>
                        <td><span class="badge ${item.estado == 1 ? 'bg-success' : 'bg-danger'}">${item.estado == 1 ? "Activo" : "Inactivo"}</span></td>
                        <td>${item.options}</td>
                    </tr>
                `;
            });
        }
    } catch (e) {
        console.log('error function -- ' + e); 
    }
}

async function registrarCliente() {
    try {
        let datos = new FormData(frm_new_cliente);
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let respuesta = await fetch(base_url_server+'src/control/ClienteController.php?tipo=registrarCliente',{
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
                showConfirmButton: false,
                timer: 1500
            });
            // Cerrar modal y limpiar formulario
            $('#clienteModal').modal('hide');
            document.getElementById('frm_new_cliente').reset();
            listarClientes();
        }else{
            Swal.fire({
                icon: "error",
                title: json.mensaje,
                showConfirmButton: false,
                timer: 1500
            });
        }
    } catch (e) {
        console.log("erro funtion -- " + e);
    }   
}