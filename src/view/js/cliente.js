document.addEventListener('DOMContentLoaded', function(){
    listarClientes();
});


async function listarClientes() {
    let tbody = document.querySelector("#tbody_ClientsApi");
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
            tbody.innerHTML = "";
            let count = 0;
            count++;
            datos.forEach(item => {
                tbody.innerHTML += `
                    <tr>
                        <td>${count}</td>
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
        }else{
            tbody.innerHTML = `
                <tr>
                    <td colspan="8" class="text-center"> ${json.mensaje} </td>
                </tr>
            `;
        }
    } catch (e) {
        console.log('error function -- ' + e); 
    }
}

async function registrarCliente() {
    let modal_new_cliente = document.getElementById('clienteModal');
    let frm_new_cliente = document.getElementById('frm_new_cliente');
    let ruc = document.getElementById('ruc').value;

    if(ruc.length < 11){
        Swal.fire({
            icon: "warning",    
            text: "El RUC debe tener 11 dígitos",
            showConfirmButton: false,
            timer: 1500
        });
        return;
    }
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
            let modal = bootstrap.Modal.getInstance(modal_new_cliente);
            modal.hide();
            frm_new_cliente.reset();
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: json.mensaje,
                showConfirmButton: false,
                timer: 1500
            });
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