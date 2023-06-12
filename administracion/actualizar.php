<?php

    $id = htmlspecialchars(strtolower($_GET["id"]));
    $nombre = htmlspecialchars(strtolower($_GET["nombre"]));
    $stock = htmlspecialchars(strtolower($_GET["stock"]));
    $precio = htmlspecialchars(strtolower($_GET["precio"]));
    $descripcion = htmlspecialchars($_GET["descripcion"]);
    $marca = htmlspecialchars(strtolower($_GET["marca"]));
    $modelo = htmlspecialchars(strtolower($_GET["modelo"]));
    $tipo = htmlspecialchars(strtolower($_GET["tipo"]));
    $color = htmlspecialchars(strtolower($_GET["color"]));

     // Update the product in the database
    $mysqli = new mysqli("localhost", "root", "", "fundamental");
    if ($mysqli->connect_errno) { 
        exit();
    }
    
    $sql = "UPDATE producto SET stock='$stock',precio_producto='$precio',descripcion_producto='$descripcion',marca='$marca',modelo='$modelo',tipo='$tipo',color='$color' 
    WHERE id_producto='$id'";

    if($result = $mysqli->query($sql)){
        echo json_encode("hecho");
    }else{
        echo "fail";
    }
