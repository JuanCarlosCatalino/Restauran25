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
                <td>S/${item.precio}</td>           
                <td class="text-center">${item.options}</td>
                `;
                document.querySelector('#tbody_platos').appendChild(nuevaFila);
                });
        }
    } catch (e) {
        console.log('error function -- ' + e); 
    }
}



async function registrarPlato() {
try {
    let datos = new FormData(frm_new_plato);
    datos.append('sesion', session_session);
    datos.append('token', token_token);
    datos.append('data', data);//id . res
    let respuesta = await fetch(base_url_server+'src/control/platos.php?tipo=registrarPlato',{
        method: 'post',
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