/* para ver productos registrados */
async function view_products() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'

        });
        json = await respuesta.json();
        contenidot = document.getElementById('content_products');


        contenidot.innerHTML = "";
        if (json.status) {
            let cont = 1;
            json.data.forEach(producto => {
                let nueva_fila = document.createElement("tr");
                nueva_fila.id = "fila" + producto.id;
                nueva_fila.className = "filas_tabla";
                nueva_fila.innerHTML = `
                            <td>${cont}</td>
                            <td>${producto.codigo}</td>
                            <td>${producto.nombre}</td>
                           
                            <td>${producto.precio}</td>
                            <td>${producto.stock}</td>
                            <td>${producto.categoria}</td>
                            <td>${producto.fecha_vencimiento}</td>
                            <td><svg id="barcode${producto.id}"></svg></td>
                            <td>${producto.proveedor}</td>
                            <td class="text-center">
                                <a href="`+ base_url + `edit-product/` + producto.id + `" class="btn btn-primary btn-sm">Editar</a>
                                <button class="btn btn-danger btn-sm" onclick="fn_eliminar(` + producto.id + `);">Eliminar</button>
                            </td>
                `;
                cont++;
                contenidot.appendChild(nueva_fila);
                //JsBarcode("#barcode"+producto.id, "Hi world!");
                JsBarcode("#barcode" + producto.id, "" + producto.codigo, {
                    // format: "CODE128",
                    //lineColor: "#0066cc",
                    width: 2,              // Ancho de cada barra (default: 2)
                    height: 30,            // Altura del código de barras (default: 100)
                    fontSize: 10,          // Tamaño del texto (default: 20)
                    margin: 5,             // Margen alrededor (default: 10)
                    displayValue: true     // Mostrar el código debajo del barcode
                });


            });
        }
    } catch (e) {
        console.log('error en mostrar producto ' + e);
    }
}

if (document.getElementById('content_products')) {
    view_products();
}



function validar_form(tipo) {
    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;
    let id_categoria = document.getElementById("id_categoria").value;
    let fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    let id_proveedor = document.getElementById("id_proveedor").value;
    /*let imagen = document.getElementById("imagen").value;*/

    //let id_proveedor = document.getElementById("id_proveedor").value;

    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || id_categoria == "" || fecha_vencimiento == "" || id_proveedor == "" /*|| imagen == ""*/) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            background: "#fff url(view/img/cat.gif) center top 20% no-repeat",
            text: "Error: Campos Vacios!",
            footer: '<a> Es necesario rellenar todos los campos </a>'
        });
        return;
    }
    if (tipo == "nuevo") {
        registrarProducto();
    }
    if (tipo == "actualizar") {
        actualizarProducto();
    }


}

if (document.querySelector('#frm_products')) {
    //Evita que se envíe el formulario
    let frm_product = document.querySelector('#frm_products');
    frm_product.onsubmit = function (e) {
        e.preventDefault();
        validar_form("nuevo");
    }
}

async function registrarProducto() {
    try {
        // capturar campos de formulario(HTML)
        const datos = new FormData(frm_products);

        //enviar datos al controlador
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        let json = await respuesta.json();
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_products').reset();
        } else {
            alert(json.msg);
        }

    } catch (error) {
        console.log("Error al registrar producto:" + error);
    }
}

/*

// Agrega el evento click a los botones de eliminar
document.querySelectorAll('.btn-eliminar').forEach(btn => {
    btn.addEventListener('click', async function () {
        if (confirm('¿Está seguro de eliminar este producto?')) {
            const datos = new FormData();
            datos.append('id', this.getAttribute('data-id'));
            let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
            });
            let json = await respuesta.json();
            alert(json.msg);
            if (json.status) {
                view_products(); // Recarga la lista
            }
        }
    });
});





// Cargar productos al cargar la página
if (document.getElementById('content_product')) {
    view_products();
}
*/
/* para editar producto */
async function edit_product() {
    try {
        let id_producto = document.getElementById('id_producto').value;
        const datos = new FormData();
        datos.append('id_producto', id_producto);

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (!json.status) {
            alert(json.msg);
            return;
        }

        // Llenar el formulario con los datos del producto
        document.getElementById('codigo').value = json.data.codigo;
        document.getElementById('nombre').value = json.data.nombre;
        document.getElementById('detalle').value = json.data.detalle;
        document.getElementById('precio').value = json.data.precio;
        document.getElementById('stock').value = json.data.stock;
        document.getElementById('id_categoria').value = json.data.id_categoria;
        document.getElementById('fecha_vencimiento').value = json.data.fecha_vencimiento;
        document.getElementById('id_proveedor').value = json.data.id_proveedor;

    } catch (error) {
        console.log('Error al cargar producto: ' + error);
    }
}

// Evento para formulario de edición
if (document.querySelector('#frm_edit_product')) {
    let frm_product = document.querySelector('#frm_edit_product');
    frm_product.onsubmit = function (e) {
        e.preventDefault();
        validar_form("actualizar");
    }
}

// Validar y actualizar producto
async function actualizarProducto() {
    const datos = new FormData(document.querySelector('#frm_edit_product'));
    let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=actualizar', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        body: datos
    });
    let json = await respuesta.json();
    if (!json.status) {
        alert("Error al actualizar producto: " + json.msg);
        return;
    } else {
        alert(json.msg);
    }
}

// para eliminar producto
async function fn_eliminar(id) {
    if (window.confirm("¿Está seguro de eliminar este producto?")) {
        eliminar(id);
    }
}

async function eliminar(id) {
    try {
        let datos = new FormData();
        datos.append('id', id); //  CAMBIO IMPORTANTE: era 'id_producto', ahora es 'id'

        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();

        if (json.status) {
            alert(json.msg);
            view_products(); // Recargar la lista
        } else {
            alert("Error: " + json.msg);
        }
    } catch (error) {
        console.log("Error al eliminar: " + error);
        alert("Error al eliminar el producto");
    }
}
//cargar categoria
async function cargar_categorias() {
    let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',

    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione</option>';
    json.data.forEach(categoria => {
        contenido += '<option value="' + categoria.id + '">' + categoria.nombre + '</option>';

    });
    //console.log(contenido);
    document.getElementById("id_categoria").innerHTML = contenido;
}


//cargar proveedores
async function cargar_proveedores() {
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_proveedores', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',

    });
    let json = await respuesta.json();
    let contenido = '<option>Seleccione</option>';
    json.data.forEach(proveedor => {
        contenido += '<option value="' + proveedor.id + '">' + proveedor.razon_social + '</option>';

    });
    //console.log(contenido);
    document.getElementById("id_proveedor").innerHTML = contenido;
}

/*

async function cargar_proveedores() {
    let respuesta = await fetch(base_url + 'control/UsuarioController.php?tipo=ver_proveedores', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
    });

    let json = await respuesta.json();
    let contenido = '<option value="">Seleccione proveedor</option>';

    if (json.status) {
        json.data.forEach(proveedor => {
            contenido += `<option value="${proveedor.id}">${proveedor.razon_social}</option>`;
        });
    }

    document.getElementById("id_proveedor").innerHTML = contenido;
}
*/

//para mostrar imagen de productos
async function view_imagen() {
    try {
        let dato = document.getElementById('busqueda_venta').value;
        const datos = new FormData();
        datos.append('dato', dato);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_producto_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos

        });



        /* Verifica que haya datos
        if (!json.status || !Array.isArray(json.data)) {
            console.error('No se encontraron productos o formato incorrecto:', json);
            return;
        }*/

        let json = await respuesta.json();
        let product_imagens = document.getElementById('product-image');
        product_imagens.innerHTML = ''; // Limpiamos antes de insertar

        json.data.forEach((producto, index) => {
            let card = document.createElement('div');
            card.classList.add('card-product');
            card.innerHTML = `
                <div>${index + 1}</div>
                <img src="${producto.imagen}" alt="${producto.nombre}">
                <div class="nombre">${producto.nombre}</div>
                <div class="detalle">${producto.detalle}</div>
                <div class="precio">
                <p>Precio:</p>
                <span>S/. ${producto.precio}</span>
                </div>
                <div class="stock">
                <strong>Stock:</strong> <span>${producto.stock}</span>
                </div>
              <div class="botones">
                    <button class="btn-detalle" data-id="${producto.id}">Ver Detalle</button>
                    <button class="btn-agregar" data-id="${producto.id}" data-precio="${producto.precio}">Agregar al Carrito</button>
                </div>

          

      `;

            product_imagens.appendChild(card);
            let id = document.getElementById('id_producto_venta');
            let precio = document.getElementById('producto_precio_venta');
            let cantidad = document.getElementById('producto_cantidad_venta');
            id.value = producto.id;
            precio.value = producto.precio;
            cantidad.value = 1;
        });


    } catch (error) {
        console.error('Error al obtener productos:', error);
    }
}

// Cargar productos al iniciar
if (document.getElementById('product-image')) {
    view_imagen();
}



// eventos de botones 
document.addEventListener("click", function (e) {
    if (e.target.classList.contains("btn-agregar")) {
        let id = e.target.dataset.id;
        let precio = e.target.dataset.precio;
        fn_agregar_carrito(id, precio);
    }

    if (e.target.classList.contains("btn-detalle")) {
        let id = e.target.dataset.id;
        fn_ver_detalle(id);
    }
});

//funcion de venta al carrito 
function fn_agregar_carrito(id, precio) {
    alert("Producto agregado al carrito: " + id);
}

function fn_ver_detalle(id) {
    alert("Ver detalle del producto: " + id);
}


