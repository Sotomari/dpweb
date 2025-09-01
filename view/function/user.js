// Validación y envío del formulario de usuario
function validar_form() {
    // Obtener todos los campos
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
        Swal.fire({
            title: "Drag me!",
            icon: "success",
            draggable: true
        });
        return;
    }


    registrarUsuario();
}


// Evento submit para frm_user
if (document.querySelector('#frm_user')) {
    // evita que se envie el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}
// Función para registrar usuario
async function registrarUsuario() {
    try {
        //capturaran campos de formulario (HTML)
        const datos = new FormData(frm_user);
        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        //validamos que json.status sea = true
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_user').reset(); // Limpia el formulario
        } else {
            alert(json.msg);
        }
    } catch (e) {
        console.log("Error al registrar Usuario:" + e);
    }

}

async function iniciar_sesion() {
    let usuario = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    if (usuario == "" || password == "") {

        //alert("Error, campos vacios!")
        Swal.fire({
            icon: "error",
            title: "Error, campos vacios!"

        });
        return;
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


async function view_users() {
    try {
        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_usuarios', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();
        if (json && json.length > 0) {
            let html = '';
            json.forEach((user, index) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${user.nro_identidad || ''}</td>
                    <td>${user.razon_social || ''}</td>
                    <td>${user.correo || ''}</td>
                    <td>${user.rol || ''}</td>
                    <td>${user.estado || ''}</td>
                      <td>
                      <a href="`+ base_url + `edit-user/` + user.id + `">Editar</a>
                      </td>
                     </tr>`;
            });
            document.getElementById('content_users').innerHTML = html;
        } else {
            document.getElementById('content_users').innerHTML = '<tr><td colspan="6">No hay usuarios disponibles</td></tr>';
        }
    } catch (error) {
        console.log("Error al obtener usuarios:", error);
        document.getElementById('content_users').innerHTML = '<tr><td colspan="6">Error al cargar los usuarios</td></tr>';
    }
}

if (document.getElementById('content_users')) {
    view_users();
}
async function edit_user() {
    try {
        let id_persona = document.getElementById('id_persona').value;
        const datos = new FormData();
        datos.append('id_persona', id_persona);

        let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos

        });
        json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }
        document.getElementById('nro_identidad').value = json.data.nro_identidad;
        document.getElementById('razon_social').value = json.data.razon_social;
        document.getElementById('telefono').value = json.data.telefono
        document.getElementById('correo').value = json.data.correo
        document.getElementById('departamento').value = json.data.departamento
        document.getElementById('provincia').value = json.data.provincia
        document.getElementById('distrito').value = json.data.distrito
        document.getElementById('cod_postal').value = json.data.cod_postal
        document.getElementById('direccion').value = json.data.direccion
        document.getElementById('rol').value = json.data.rol
    


    } catch (error) {
        console.log('oops, ucurrió un error' + error);
    }

}