
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


}



async function listar_temporales() {

    try {
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=listar_venta_temporales', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            let lista_temporal = '';
            json.forEach(t_venta => {
                lista_temporal += `<tr>  
             
                <td>t_venta.nombre</td>
                  <td><input type="number" id="cant_${t_venta.id}" value="${t_venta.cantidad};"style="width: 60px;" onkeyup="actualizar_subtotal,   onchange="actuaslizar_subtotal (${t_venta.id},${t_venta.precio}); "></td>
          
                  <td>s/.${t_venta.precio}</td>
                  <input type="hidden" id="precio_${t_venta.id}" value=
                  <td id="subtotal_${t_venta.id}">s/. ${t_venta.cantidad * t_venta.precio}</td>
                
                  <td><button class="btn btn-danger btn-sm">X</button></td>
                </tr>`

                document.getElementById('lista_compra').innerHTML = lista_temporal;

            });

        }

    } catch (error) {
        console.log("error en cargar productos temporal" + error);
    }

}
async function actualizar_subtotal(id, precio) {
    let cantidad = document.getElementById('cant_' + id).value;
    try {
        const datos = new FormData();
        datos.append('id', id);
        datos.append('cantidad', cantidad);
        let respuesta = await fetch(base_url + 'control/VentaController.php?tipo=actualizar_cantidad', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (condition) {
            subtotal = cantidad * precio;
            document.getElementById('subtotal_'+id).innerHTML = 'S/. '+subtotal;
        }

    } catch (error) {
        console.log("error al actualizar cantidad :" + error)

    }
    
}
