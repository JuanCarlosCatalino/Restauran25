document.addEventListener('DOMContentLoaded', function(){
    listarRestaurantes();
});
async function listarRestaurantes() {
    let bodyTable = document.querySelector('#contenedor_restaurantes');
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let respu = await fetch(base_url_server+'src/control/restaurante.php?tipo=listarRestaurantes',{
       method: 'POST',
       mode: 'cors',
       cache: 'no-cache',
       body: datos
        });
        json = await respu.json();
        if(json.status){
            bodyTable.innerHTML = '';
            let datos = json.contenido;
             datos.forEach(item => {
                let nuevaFila =  document.createElement("div");
                nuevaFila.className = 'col-md-6 col-lg-4';
                nuevaFila.id = item.id;
                nuevaFila.innerHTML = `
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">${item.nombre}</h5>
                            <p class="card-text text-muted mb-2">
                                <i class="bi bi-geo-alt-fill me-2"></i>${item.ubicacion}
                            </p>
                            <p class="card-text text-muted">
                                <i class="bi bi-telephone-fill me-2"></i>${item.telefono}
                            </p>
                            <span class="badge bg-success">${item.estado}</span>
                        </div>
                        <div class="card-footer bg-white border-top-0 d-flex justify-content-end">
                            <div class="btn-group" role="group">
                                ${item.options}
                            </div>
                        </div>
                    </div>
                `;
                document.querySelector('#contenedor_restaurantes').appendChild(nuevaFila);
                });
         
        }
    } catch (e) {
        console.log('error function -- ' + e); 
    }
}

async function registrarRestaurante() {
    let formNewRestaurante = document.getElementById('frm_new_restaurante');
try {
    let datos = new FormData(frm_new_restaurante);
    datos.append('sesion', session_session);
    datos.append('token', token_token);
    let respuesta = await fetch(base_url_server+'src/control/restaurante.php?tipo=registrarRestaurante',{
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if(json.status){
        let modal = document.getElementById('restauranteModal');
        let modalInstance = bootstrap.Modal.getInstance(modal);
        modalInstance.hide();
        formNewRestaurante.reset();
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: json.mensaje,
            showConfirmButton: false,
            timer: 1500
            });
            listarRestaurantes();
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