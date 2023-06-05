<?php
$id = $_GET["id"];

$mysqli = new mysqli("localhost", "root", "", "fundamental");
if ($mysqli->connect_errno) { 
    exit();
}

$sql = "DELETE FROM producto WHERE id_producto='$id'";

if($result = $mysqli->query($sql)){
    echo json_encode("hecho");
}else{
    echo json_encode("fail");
}