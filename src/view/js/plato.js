async function registrarPlato() {
try {
    let datos = new FormData(frm_new_plato);
    datos.append('sesion', session_session);
    datos.append('token', token_token);
} catch (e) {
    console.log("arro funtion -- " + e);
}    
}