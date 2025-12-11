
//venta ver en consola
let productos_venta = {};
let id = 2;
let id2 = 4;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 100;
producto.cantidad = 2;

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 200;
producto2.cantidad = 1;
//productos_venta.push(producto);

productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);

async function agregar_producto_temporal() {
    let id = document.getElementById('id_producto_venta').value;
    let precio = document.getElementById('producto_precio_venta').value;
    let cantidad = document.getElementById('producto_cantidad_venta').value;
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            if (json.msg == "registrado") {
                alert("el producto fue registrado");
            } else {
                alert("el producto fue actualizado")
            }
        }

    } catch (error) {
        console.log("error en agregar producto temporal" + error);
    }



//listar a carrito

    async function listar_carrito() {
    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=ver_temporal', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });

        let json = await respuesta.json();

        if (json.status) {
            let tabla = document.getElementById('tabla_carrito');
            tabla.innerHTML = "";

            json.data.forEach(item => {
                tabla.innerHTML += `
                    <tr>
                        <td>${item.nombre}</td>
                        <td>${item.cantidad}</td>
                        <td>$${item.precio}</td>
                        <td>$${item.precio * item.cantidad}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="eliminarTemporal(${item.id_producto})">X</button>
                        </td>
                    </tr>
                `;
            });
        }
    } catch (e) {
        console.log("Error en listar carrito", e);
    }
}

}
