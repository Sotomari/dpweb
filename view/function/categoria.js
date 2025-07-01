function validar_form_categoria() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre === "" || detalle === "") {
        Swal.fire("Error", "Campos vacíos", "warning");
        return;
    }

    registrarCategoria();
}

if (document.querySelector('#frm_categoria')) {
    let form = document.querySelector('#frm_categoria');
    form.onsubmit = function (e) {
        e.preventDefault();
        validar_form_categoria();
    };
}

async function registrarCategoria() {
    try {
        const datos = new FormData(document.getElementById('frm_categoria'));
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            Swal.fire("Éxito", json.msg, "success");
            document.getElementById('frm_categoria').reset();
        } else {
            Swal.fire("Error", json.msg, "error");
        }
    } catch (error) {
        console.error("Error al registrar categoría:", error);
    }
}



