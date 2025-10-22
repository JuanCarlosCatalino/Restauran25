document.addEventListener('DOMContentLoaded', function(){
    listarPlatos();
});
async function listarPlatos() {
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        datos.append('data', data);
        let respu = await fetch(base_url_server+'src/control/platos.php?tipo=listarPlatos',{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
        });
        json = await respu.json();
        let htmBody = document.getElementById('tbody_platos');
        if(json.status){
            htmBody.innerHTML= '';
            let datos = json.contenido;
                datos.forEach(item => {
                let nuevaFila =  document.createElement("tr");
                nuevaFila.id = item.id;
                nuevaFila.innerHTML = `
                <td class="fw-bold">${item.nombre}</td>
                <td>${item.precio}</td>           
                <td>${item.categoria}</td>           
                <td class="text-center">${item.options}</td>
                `;
                document.querySelector('#tbody_platos').appendChild(nuevaFila);
                });   
        }else{
            htmBody.innerHTML= `<tr><td colspan="4" class="text-center fw-bold">${json.mensaje}</td></tr>`;
        }
    } catch (e) {
        console.log('error function -- ' + e); 
    }
}



async function registrarPlato() {
    let modal_new_plato = document.getElementById('platoModal');
    let frm_new_plato = document.getElementById('frm_new_plato');
try {
    let datos = new FormData(frm_new_plato);
    datos.append('sesion', session_session);
    datos.append('token', token_token);
    datos.append('data', data);//id . restaurante
    let respuesta = await fetch(base_url_server+'src/control/platos.php?tipo=registrarPlato',{
        method: 'post',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if(json.status){
        let modal = bootstrap.Modal.getInstance(modal_new_plato);
        modal.hide();
        frm_new_plato.reset();
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: json.mensaje,
            showConfirmButton: false,
            timer: 1500
            });
           listarPlatos();
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