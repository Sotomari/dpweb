function validar_form() {
    let id_persona = document.getElementById("id_persona").value;
    let fecha_hora_inicio = document.getElementById("fecha_hora_inicio").value;
    let fecha_hora_fin = document.getElementById("fecha_hora_fin").value;
    let token = document.getElementById("token").value;
    let ip = document.getElementById("ip").value;
    

    if (id_persona == "" || fecha_hora_inicio == "" || fecha_hora_fin == "" || token == "" || ip == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            background: "#fff url(view/img/cat.gif) center top 20% no-repeat",
            text: "Error: Campos Vacios!",
            footer: '<a> Es necesario rellenar todos los campos </a>'
        });
        return;
    }
    registrarSesion();


}

if (document.querySelector('#frm_sesion')) {
    //Evita que se envíe el formulario
    let frm_sesion = document.querySelector('#frm_sesion');
    frm_sesion.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarSesion() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_sesion);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/SesionController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_sesion').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar usuario:" + error);
    }
}