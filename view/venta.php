async function view_imagen() {
    try {
        let dato = document.getElementById('buscar_producto').value;
        const datos = new FormData();
        datos.append('dato', dato);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=buscar_producto_venta', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        product_imagens = document.getElementById('product-imagen');
        product_imagens.innerHTML = ''; // limpiamos antes de insertar

        json.forEach((product, index) => {
            let card = document.createElement('div');
            card.classList.add('card-product');
            card.innerHTML = `
                <div>${index + 1}</div>
                <img src="${product.imagen}" alt="${product.nombre}">
                <div class="nombre">${product.nombre}</div>
                <div class="detalle">${product.detalle}</div>
                <div class="precio"> <p>precio:</p>
                <span>${product.precio}</span>
                </div>

                <div style="display: flex; gap: 4px;">
                <button class="btn-carrito"><i class="fas fa-shopping-cart"></i>🛒Carrito</button>
                <button class="btn-detalles">📒Detalles</button>
                </div>
                
            `;

            product_imagens.appendChild(card);
        });


    } catch (error) {
        console.log('Error al obtener productos: ' + error);
    }
}