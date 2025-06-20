function validar_form() {
    let Nro_identidad = document.getElementById("Nro_identidad").value;
    let Razon_Social = document.getElementById("Razon_Social").value;
    let telefono = document.getElementById("telefono").value;
    let correo = document.getElementById("correo").value;
    let Departamento = document.getElementById("Departamento").value;
    let Provincia = document.getElementById("Provincia").value;
    let Distrito = document.getElementById("Distrito").value;
    let Cod_Postal = document.getElementById("Cod_Postal").value;
    let Direccion = document.getElementById("Direccion").value;
    let Rol = document.getElementById("Rol").value;

    if (Nro_identidad == "" || Razon_Social == "" || telefono == "" || correo == "" || Departamento == "" || Provincia == "" || Distrito == "" || Cod_Postal == "" || Direccion == "" || Rol == "") {
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
        let respuesta =await fetch(base_url +'control/UsuarioController.php?tipo=registrar',{
          method: 'POST',
          model: 'cors',
          cache: 'no-cache',
          body: datos
        });
        
    } catch (e) {
        console.log("Error al registrar Usuario:"+e);
    }

}


    
 