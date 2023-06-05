function salir() {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'cerrarSesion.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.send('eliminar=' + encodeURIComponent("si"));

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {} else {
                alert('Error');
            }
        }
    };
    window.location.href = "http://localhost/PROYECTO_FUNDAMENTAL/administracion/loginAdm.php";
}