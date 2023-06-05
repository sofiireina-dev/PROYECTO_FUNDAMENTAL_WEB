<?php
session_start();

$m_carrito = "";
// Agregar un producto al carrito
if (isset($_POST["id"]) && isset($_POST["cantidad"]) && !isset($_POST["eliminar"]) && !isset($_POST["carrito"])) {
    $id_producto = $_POST["id"];
    $cantidad_producto = $_POST["cantidad"];

    // Agregar producto al carrito
    if (isset($_SESSION["carrito"][$id_producto])) {
        $_SESSION["carrito"][$id_producto] += $cantidad_producto;
    } else {
        $_SESSION["carrito"][$id_producto] = $cantidad_producto;
    }

    // Redirigir a la página de productos
    echo json_encode("hecho");
}

if (isset($_POST["id"]) && isset($_POST["carrito"])) {
    $id_producto = $_POST["id"];

    // Agregar producto al carrito
    if (isset($_SESSION["carrito"][$id_producto])) {
        $_SESSION["carrito"][$id_producto] += 1;
    } 

    // Redirigir a la página de productos
    echo json_encode("hecho");
}

if (isset($_POST["id"]) && isset($_POST["borrar_carrito"])) {
    $id_producto = $_POST["id"];

    // Agregar producto al carrito
    if (isset($_SESSION["carrito"][$id_producto])) {
        $_SESSION["carrito"][$id_producto] -= 1;
    } 

    // Redirigir a la página de productos
    echo json_encode("hecho");
}

if (isset($_POST["vaciar"])) {
    $_SESSION["carrito"] = array(); // Reinicializa el carrito como un array vacío
    echo json_encode("Carrito vaciado");
}

if (isset($_POST["id"]) && isset($_POST["eliminar"])) {
    $id_producto = $_POST["id"];

    if (isset($_SESSION["carrito"][$id_producto])) {
        // Eliminar el producto del carrito
        unset($_SESSION["carrito"][$id_producto]);
        echo json_encode("Producto eliminado del carrito");
    } else {
        echo json_encode("El producto no existe en el carrito");
    }
}