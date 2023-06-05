document.addEventListener("readystatechange", cargarEventos, true);

function cargarEventos(evento) {
    if (document.readyState == "interactive") {
        document.getElementById("productos").addEventListener("click", ocultar, true);
        document.getElementById("seleccionar").addEventListener("click", mostrar, true);
        document.getElementById("crear").addEventListener("click", enviar, true);
    }
}

function enviar() {
    document.forms["alta"].submit()
}

function comprobarSeleccionado() {
    const seleccion = document.getElementById('productos').value;
    return seleccion;
}

function mostrar() {
    if (comprobarSeleccionado() == "funda") {
        document.getElementById("nombre").value = "funda";
        document.getElementById("div-stock").className = "col-6";
        document.getElementById("div-precio").className = "col-6";
        document.getElementById("div-descripcion").className = "col-6";
        document.getElementById("div-marca").className = "col-6";
        document.getElementById("div-modelo").className = "col-6";
        document.getElementById("div-tipo").className = "col-6";
        document.getElementById("div-color").className = "col-6";
        document.getElementById("categoria").value = "1";
        document.getElementById("seleccionar").className = "esconder";
    } else if (comprobarSeleccionado() == "cristal") {
        document.getElementById("nombre").value = "cristal";
        document.getElementById("div-stock").className = "col-6";
        document.getElementById("div-precio").className = "col-6";
        document.getElementById("div-descripcion").className = "col-6";
        document.getElementById("div-marca").className = "col-6";
        document.getElementById("div-modelo").className = "col-6";
        document.getElementById("div-borde").className = "col-6";
        document.getElementById("seleccionar").className = "esconder";
        document.getElementById("categoria").value = "2";
    }
    document.getElementById("div-crear").className = "";
}

function ocultar() {
    document.getElementById("div-crear").className = "esconder";
    document.getElementById("div-nombre").className = "esconder";
    document.getElementById("div-stock").className = "esconder";
    document.getElementById("div-precio").className = "esconder";
    document.getElementById("div-descripcion").className = "esconder";
    document.getElementById("div-marca").className = "esconder";
    document.getElementById("div-modelo").className = "esconder";
    document.getElementById("div-tipo").className = "esconder";
    document.getElementById("div-color").className = "esconder";
    document.getElementById("div-borde").className = "esconder";
    document.getElementById("div-categoria").className = "esconder";
    document.getElementById("seleccionar").className = "";
}