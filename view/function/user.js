function validar_form() {
    let nro_identidad = document.getElementById("nro_identidad").value;
    let razon_social = document.getElementById("razon_social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let departamento = document.getElementById("departamento").value;
    let provincia = document.getElementById("provincia").value;
    let distrito = document.getElementById("distrito").value;
    let cod_postal = document.getElementById("cod_postal").value;
    let direccion = document.getElementById("direccion").value;
    let rol = document.getElementById("rol").value;

    if (nro_identidad == "" || razon_social == "" || telefono == "" || correo == "" || departamento == "" || provincia == "" || distrito == "" || cod_postal == "" || direccion == "" || rol == "") {
        alert("Error: Existen campos vacios");
        return;
    }
    Swal.fire({
        title: "Drag me!",
        icon: "success",
        draggable: true
    });

    registrarUsuario();

}

if (document.querySelector('#frm_user')) {
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}
async function registrarUsuario() {
    try {
        //capturaran campos de formulario (HTML)
        const datos = new FormData(frm_user);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            model: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        //validamos  que json.status sea 0 True
        if (json.estatus) {
            alert(json.msg);
            document.getElementById('frm_user').reset();
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Usuario:" + e);
    }
}
async function iniciar_sesion() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (username == "" || password == "") {

        alert("Error, campos vacios!");
        Swal.fire("SweetAlert2 is working!");

    }
    
    try {
        const datos = new FormData(frm_login);
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        //validamos  que json.status sea 0 True
        if (json.status) {
            location.replace(base_url + 'new-user');

        } else {
            alert(json.msg);
        }
   
    
} catch (error) {
    console.log(error);

}

}



