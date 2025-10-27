
// VALIDAR FORMULARIO VENTA

function validar_form_venta(tipo) {
    let fecha = document.getElementById("fecha").value;
    let id_cliente = document.getElementById("id_cliente").value;
    let id_vendedor = document.getElementById("id_vendedor").value;
    let total = document.getElementById("total").value;
    let estado = document.getElementById("estado").value;

    if (fecha == "" || id_cliente == "" || id_vendedor == "" || total == "" || estado == "") {
        Swal.fire({
            icon: "error",
            title: "Error, complete todos los campos!"
        });
        return;
    }

    if (tipo == "nuevo") {
        registrarVenta();
    }
    if (tipo == "actualizar") {
        actualizarVenta();
    }
}


// SUBMIT FORMULARIO VENTA

if (document.querySelector('#frm_venta')) {
    let frm_venta = document.querySelector('#frm_venta');
 frm_venta.onsubmit = function (e) {
    e.preventDefault();
    validar_form_venta("nuevo");
}
}


// REGISTRAR VENTA

async function registrarVenta() {
    try {
        const datos = new FormData(frm_venta);
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();

        if (json.status) {
            Swal.fire("Correcto", json.msg, "success");
            document.getElementById('frm_venta').reset();
        } else {
            Swal.fire("Error", json.msg, "error");
        }
    } catch (error) {
        console.log("Error al registrar venta: " + error);
    }
}


// LISTAR VENTAS

async function view_ventas() {
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=ver_ventas', {
            method: 'POST'
        });
        let json = await respuesta.json();

   if (json && json.data.length > 0) {
    let html = "";
    json.data.forEach((venta, index) => {
        html += `<tr>
            <td>${venta.id}</td>
            <td>${venta.fecha}</td>
            <td>${venta.total}</td>
            <td>${venta.id_cliente}</td>
            <td>${venta.id_vendedor}</td>
            <td>
                <a href="${base_url}edit-venta/${venta.id}" class="btn btn-sm btn-warning">Editar</a>
                <button onclick="btn_eliminar_venta(${venta.id});" class="btn btn-sm btn-danger">Eliminar</button>
            </td>
        </tr>`;
    });
    document.getElementById("content_ventas").innerHTML = html;
} else {
    document.getElementById("content_ventas").innerHTML = '<tr><td colspan="6">No hay ventas disponibles</td></tr>';
}
    } catch (error) {
        console.log("Error al obtener ventas:", error);
    }
}
if (document.getElementById('content_ventas')) {
    view_ventas();
}


// EDITAR VENTA

async function edit_venta() {
    try {
        let id_venta = document.getElementById("id_venta").value;
        const datos = new FormData();
        datos.append("id_venta", id_venta);

        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=ver', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();

        if (!json.status) {
            Swal.fire("Error", json.msg, "error");
            return;
        }

        document.getElementById("fecha").value = json.data.fecha;
        document.getElementById("id_cliente").value = json.data.id_cliente;
        document.getElementById("id_vendedor").value = json.data.id_vendedor;
        document.getElementById("total").value = json.data.total;
        document.getElementById("estado").value = json.data.estado;

    } catch (error) {
        console.log("Error al cargar venta: " + error);
    }
}

if (document.querySelector('#frm_edit_venta')) {
    let frm_venta = document.querySelector('#frm_edit_venta');
    frm_venta.onsubmit = function (e) {
        e.preventDefault();
        validar_form_venta("actualizar");
    }
}


// ACTUALIZAR VENTA

async function actualizarVenta() {
    try {
     const datos = new FormData(document.getElementById("frm_edit_venta"));

        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=actualizar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();

        if (json.status) {
            Swal.fire("Correcto", json.msg, "success");
        } else {
            Swal.fire("Error", json.msg, "error");
        }
    } catch (error) {
        console.log("Error al actualizar venta:", error);
    }
}


// ELIMINAR VENTA
async function btn_eliminar_venta(id) {
    if (confirm("¿Desea eliminar la venta?")) {
        let datos = new FormData();
        datos.append("id_venta", id);

        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=eliminar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();

        if (json.status) {
            Swal.fire("Correcto", json.msg, "success");
            view_ventas(); // recarga la tabla
        } else {
            Swal.fire("Error", json.msg, "error");
        }
    }
}
