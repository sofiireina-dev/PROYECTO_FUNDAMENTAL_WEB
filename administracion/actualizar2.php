<?php
$id = $_GET["id"];
$nombre = $_GET["nombre"];
$stock = $_GET["stock"];
$precio = $_GET["precio"];
$descripcion = $_GET["descripcion"];
$marca = $_GET["marca"];
$modelo = $_GET["modelo"];
$borde = $_GET["borde"];

    // Update the product in the database
$mysqli = new mysqli("localhost", "root", "", "fundamental");
if ($mysqli->connect_errno) { 
    exit();
}

$sql = "UPDATE producto SET stock='$stock',precio_producto='$precio',descripcion_producto='$descripcion',marca='$marca',modelo='$modelo',con_borde='$borde' 
WHERE id_producto='$id'";

if($result = $mysqli->query($sql)){
    echo json_encode("hecho");
}else{
    echo "fail";
}