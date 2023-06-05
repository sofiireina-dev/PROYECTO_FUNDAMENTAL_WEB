function updateProduct(id) {
    console.log("id= " + id)
        // Get the row with the given ID
    var row = document.querySelector("input[value='" + id + "']").parentNode.parentNode;

    // Get the values of the inputs
    var nombre = row.querySelector("input[name='nombre[]']").value;
    var stock = row.querySelector("input[name='stock[]']").value;
    var precio = row.querySelector("input[name='precio[]']").value;
    var descripcion = row.querySelector("input[name='descripcion[]']").value;
    var marca = row.querySelector("input[name='marca[]']").value;
    var modelo = row.querySelector("input[name='modelo[]']").value;
    var tipo = row.querySelector("input[name='tipo[]']").value;
    var color = row.querySelector("input[name='color[]']").value;

    // Send the data to the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the row with the new data
            var respuesta = JSON.parse(xhttp.responseText);
            if (respuesta == "hecho") {
                // document.getElementById("notificacion").className = "toast-container position-absolute p-3";
                notificacion();
                //Se muestran los valores actualizados
                row.querySelector("input[name='nombre[]']").value = nombre;
                row.querySelector("input[name='stock[]']").value = stock;
                row.querySelector("input[name='precio[]']").value = precio;
                row.querySelector("input[name='descripcion[]']").value = descripcion;
                row.querySelector("input[name='marca[]']").value = marca;
                row.querySelector("input[name='modelo[]']").value = modelo;
                row.querySelector("input[name='tipo[]']").value = tipo;
                row.querySelector("input[name='color[]']").value = color;
            }
        }
    };
    xhttp.open("GET", "actualizar.php?id=" + id + "&nombre=" + nombre + "&stock=" + stock + "&precio=" + precio + "&descripcion=" + descripcion + "&marca=" + marca + "&modelo=" + modelo + "&tipo=" + tipo + "&color=" + color, true);
    xhttp.send(null);
}

function updateProduct2(id) {
    console.log("id= " + id)
        // Get the row with the given ID
    var row = document.querySelector("input[value='" + id + "']").parentNode.parentNode;

    // Get the values of the inputs
    var nombre = row.querySelector("input[name='nombre[]']").value;
    var stock = row.querySelector("input[name='stock[]']").value;
    var precio = row.querySelector("input[name='precio[]']").value;
    var descripcion = row.querySelector("input[name='descripcion[]']").value;
    var marca = row.querySelector("input[name='marca[]']").value;
    var modelo = row.querySelector("input[name='modelo[]']").value;
    var borde = row.querySelector("input[name='borde[]']").value;

    // Send the data to the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the row with the new data
            var respuesta = JSON.parse(xhttp.responseText);
            if (respuesta == "hecho") {
                notificacion();

                row.querySelector("input[name='nombre[]']").value = nombre;
                row.querySelector("input[name='stock[]']").value = stock;
                row.querySelector("input[name='precio[]']").value = precio;
                row.querySelector("input[name='descripcion[]']").value = descripcion;
                row.querySelector("input[name='marca[]']").value = marca;
                row.querySelector("input[name='modelo[]']").value = modelo;
                row.querySelector("input[name='borde[]']").value = borde;
            }
        }
    };
    xhttp.open("GET", "actualizar2.php?id=" + id + "&nombre=" + nombre + "&stock=" + stock + "&precio=" + precio + "&descripcion=" + descripcion + "&marca=" + marca + "&modelo=" + modelo + "&borde=" + borde, true);
    xhttp.send(null);
}

function deleteProduct(id) {
    console.log("id= " + id)
    var row = document.querySelector("input[value='" + id + "']").parentNode.parentNode;
    // Send the data to the server using AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update the row with the new data
            var respuesta = JSON.parse(xhttp.responseText);
            if (respuesta == "hecho") {
                // document.getElementById("notificacion").className = "toast-container position-absolute p-3";
                row.className = "esconder";
                notificacion2();
            }
        }
    };
    xhttp.open("GET", "eliminar.php?id=" + id, true);
    xhttp.send(null);
}


function notificacion() {
    // Create a new div element
    const divNotificacion = document.createElement('div');
    divNotificacion.setAttribute('id', 'notificacion');
    divNotificacion.classList.add('toast-container', 'position-absolute', 'p-3');
    divNotificacion.style.right = '0';
    divNotificacion.style.top = '0';

    // Create a new toast element
    const toast = document.createElement('div');
    toast.classList.add('toast', 'show', 'bg-dark', 'text-white');
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');

    // Create a new d-flex element
    const dFlex = document.createElement('div');
    dFlex.classList.add('d-flex');

    // Create a new toast-body element
    const toastBody = document.createElement('div');
    toastBody.classList.add('toast-body');
    toastBody.textContent = 'Producto actualizado.';

    // Create a new button element
    const button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.classList.add('btn-close', 'btn-close-white', 'me-2', 'm-auto');
    button.setAttribute('aria-label', 'Close');
    button.setAttribute('data-bs-dismiss', 'toast');

    // Add the toast-body and button elements as children of the d-flex element
    dFlex.appendChild(toastBody);
    dFlex.appendChild(button);

    // Add the d-flex element as a child of the toast element
    toast.appendChild(dFlex);

    // Add the toast element as a child of the divNotificacion element
    divNotificacion.appendChild(toast);

    // Add the divNotificacion element to the body of the HTML document
    document.body.appendChild(divNotificacion);
}

function notificacion2() {
    // Create a new div element
    const divNotificacion = document.createElement('div');
    divNotificacion.setAttribute('id', 'notificacion');
    divNotificacion.classList.add('toast-container', 'position-absolute', 'p-3');
    divNotificacion.style.right = '0';
    divNotificacion.style.top = '0';

    // Create a new toast element
    const toast = document.createElement('div');
    toast.classList.add('toast', 'show', 'bg-dark', 'text-white');
    toast.setAttribute('role', 'alert');
    toast.setAttribute('aria-live', 'assertive');
    toast.setAttribute('aria-atomic', 'true');

    // Create a new d-flex element
    const dFlex = document.createElement('div');
    dFlex.classList.add('d-flex');

    // Create a new toast-body element
    const toastBody = document.createElement('div');
    toastBody.classList.add('toast-body');
    toastBody.textContent = 'Producto eliminado.';

    // Create a new button element
    const button = document.createElement('button');
    button.setAttribute('type', 'button');
    button.classList.add('btn-close', 'btn-close-white', 'me-2', 'm-auto');
    button.setAttribute('aria-label', 'Close');
    button.setAttribute('data-bs-dismiss', 'toast');

    // Add the toast-body and button elements as children of the d-flex element
    dFlex.appendChild(toastBody);
    dFlex.appendChild(button);

    // Add the d-flex element as a child of the toast element
    toast.appendChild(dFlex);

    // Add the toast element as a child of the divNotificacion element
    divNotificacion.appendChild(toast);

    // Add the divNotificacion element to the body of the HTML document
    document.body.appendChild(divNotificacion);
}