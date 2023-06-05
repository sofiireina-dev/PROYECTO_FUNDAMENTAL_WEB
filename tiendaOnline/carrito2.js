function incrementarNumero(id, stock) {
    let id_p = id;
    let stock_p = stock;
    let cantidad = document.getElementById("cant_" + id_p);
    let cantidad_i = Number(cantidad.value) + 1;
    if (cantidad_i <= stock_p) {
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'agregar_al_carrito.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.send('id=' + encodeURIComponent(id_p) +
            '&carrito=' + encodeURIComponent("si"));

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload(true);
                } else {
                    alert('Error al agregar el producto al carrito');
                }
            }
        };
    }
}

function decrementarNumero(id) {
    let id_p = id;
    let cantidad = document.getElementById("cant_" + id_p);
    let cantidad_i = Number(cantidad.value) - 1;
    if (cantidad_i >= 1) {
        // document.getElementById("precio_total_valor").innerHTML = Number(precio_total) - precio;
        // cantidad.value = cantidad_i;
        // let total = cantidad_i * precio_p;
        // celda.innerHTML = total + "€";
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'agregar_al_carrito.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.send('id=' + encodeURIComponent(id_p) +
            '&borrar_carrito=' + encodeURIComponent("si"));

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    location.reload(true);
                } else {
                    alert('Error al eliminar el producto del carrito');
                }
            }
        };
    }
}

function productos_incrementarNumero(id, stock) {
    let id_p = id;
    let stock_p = stock;
    let cantidad = document.getElementById("cantidad_" + id_p);
    let cantidad_i = Number(cantidad.value) + 1;
    if (cantidad_i <= stock_p) {
        cantidad.value = cantidad_i;
    }
}

function productos_decrementarNumero(id, stock) {
    let id_p = id;
    let stock_p = stock;
    let cantidad = document.getElementById("cantidad_" + id_p);
    let cantidad_i = Number(cantidad.value) - 1;
    if (cantidad_i >= 1) {
        cantidad.value = cantidad_i;
    }
}

function agregarAlCarrito(id) {
    var id_producto = id;
    var cantidad_producto = document.getElementById("cantidad_" + id_producto).value;

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'agregar_al_carrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('id=' + encodeURIComponent(id_producto) +
        '&cantidad=' + encodeURIComponent(cantidad_producto));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                document.getElementById("img-carrito" + id_producto).src = '../img/check.png';
            } else {
                alert('Error al agregar el producto al carrito');
            }
        }
    };
}

function vaciarCarrito() {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'agregar_al_carrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('vaciar=' + encodeURIComponent("si"));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Recargar la página actual forzando la recarga desde el servidor
                location.reload(true);
            } else {
                alert('Error al vaciar el carrito');
            }
        }
    };
}

function eliminarDelCarrito(id) {
    var id_producto = id;
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'agregar_al_carrito.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('eliminar=' + encodeURIComponent("si") +
        '&id=' + encodeURIComponent(id_producto));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Recargar la página actual forzando la recarga desde el servidor
                location.reload(true);
            } else {
                alert('Error al eliminar producto del carrito');
            }
        }
    };
}