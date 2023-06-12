<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Cliente</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <div class="container m-md-auto mx-sm-2 mt-md-4 mt-sm-4 mx-3">
        <div class="row">
            <div class="datos-contenedor">
                <?php
                    if (isset($_POST["precio"])) {
                        $precio_total = $_POST["precio"];
                        echo "<h1 class='datos-titPag'>Rellene los datos:</h1>
                        <form action='datosCliente.php' method='post'>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='nombre' class='form-label' maxlength='15'>Nombre</label>
                                                <input type='text' class='form-control' id='nombre' name='nombre' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='apellidos' class='form-label' maxlength='40'>Apellidos</label>
                                                <input type='text' class='form-control' id='apellidos' name='apellidos' maxlength='40'>
                                            </div>
                                        </div>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='telefono' class='form-label'>Teléfono</label>
                                                <input type='text' class='form-control' id='telefono' name='telefono' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='text' class='form-label'>Dirección</label>
                                                <input type='text' class='form-control' id='direccion' name='direccion' maxlength='70'>
                                            </div>
                                        </div>
                                        <input type='hidden' name='precioVenta' value='$precio_total'>
                                        <input type='submit' value='Continuar' class='datos-btn-continuar'>
                                    </form>";
                    }
                    if (!isset($_POST["precio"]) && isset($_POST["nombre"]) && $_POST["nombre"] != "" && isset($_POST["apellidos"]) && $_POST["apellidos"] != "" && isset($_POST["telefono"]) && $_POST["telefono"] != "" && isset($_POST["direccion"]) && $_POST["direccion"] != ""&&isset($_POST["precioVenta"])) {
                        $nombre = htmlspecialchars(strtolower($_POST["nombre"]));
                        $apellidos = htmlspecialchars(strtolower($_POST["apellidos"]));
                        $telefono = htmlspecialchars(strtolower($_POST["telefono"]));
                        $direccion = htmlspecialchars(strtolower($_POST["direccion"]));
                        $precio_total = htmlspecialchars(strtolower($_POST["precioVenta"]));

                        include_once("config.php");
                        $mysqli = new mysqli($host, $user, $pass, $bbdd);

                        if ($mysqli->connect_errno) { //Nos conectamos a la base de datos
                            exit();
                        }

                        if ($result = $mysqli->query("SELECT nombre_cli, apellidos_cli, id_cli FROM cliente where nombre_cli = '$nombre'  AND apellidos_cli = '$apellidos';")) {
                            if($result->num_rows == 0){
                                if($result = $mysqli->query("INSERT INTO cliente (nombre_cli, apellidos_cli, telefono_cli, direccion_cli) VALUES ('$nombre', '$apellidos', '$telefono', '$direccion') ;")){
                                    if ($result = $mysqli->query("SELECT id_cli FROM cliente where nombre_cli = '$nombre'  AND apellidos_cli = '$apellidos';")) {
                                        foreach($result as $id_cli){
                                                echo "<script>";
                                                echo "var form = document.createElement('form');
                                                form.method = 'POST';
                                                form.action = 'exito.php';
                                                
                                                var parametro1 = document.createElement('input');
                                                parametro1.type = 'hidden';
                                                parametro1.name = 'precio';
                                                parametro1.value = '$precio_total';
                                                form.appendChild(parametro1);

                                                var parametro2 = document.createElement('input');
                                                parametro2.type = 'hidden';
                                                parametro2.name = 'cliente';
                                                parametro2.value = '".$id_cli["id_cli"]."';
                                                form.appendChild(parametro2);
                                                
                                                document.body.appendChild(form);
                                                form.submit();";
                                                echo "</script>";
                                        }
                                    }
                                }else{
                                    echo "<h1 class='datos-titPag'>Rellene los datos:</h1>
                                    <form action='datosCliente.php' method='post'>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='nombre' class='form-label' maxlength='15'>Nombre</label>
                                                <input type='text' class='form-control' id='nombre' name='nombre' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='apellidos' class='form-label' maxlength='40'>Apellidos</label>
                                                <input type='text' class='form-control' id='apellidos' name='apellidos' maxlength='40'>
                                            </div>
                                        </div>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='telefono' class='form-label'>Teléfono</label>
                                                <input type='text' class='form-control' id='telefono' name='telefono' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='text' class='form-label'>Dirección</label>
                                                <input type='text' class='form-control' id='direccion' name='direccion' maxlength='70'>
                                            </div>
                                        </div>
                                        <input type='hidden' name='precioVenta' value='$precio_total'>
                                        <p style='color:red;'>Datos inválidos</p>
                                        <input type='submit' value='Continuar' class='datos-btn-continuar'>
                                    </form>";
                                }

                            }else{
                                foreach($result as $id_cli){
                                    echo "<script>";
                                        echo "var form = document.createElement('form');
                                        form.method = 'POST';
                                        form.action = 'exito.php';
                                        
                                        var parametro1 = document.createElement('input');
                                        parametro1.type = 'hidden';
                                        parametro1.name = 'precio';
                                        parametro1.value = '$precio_total';
                                        form.appendChild(parametro1);

                                        var parametro2 = document.createElement('input');
                                        parametro2.type = 'hidden';
                                        parametro2.name = 'cliente';
                                        parametro2.value = '".$id_cli["id_cli"]."';
                                        form.appendChild(parametro2);
                                        
                                        document.body.appendChild(form);
                                        form.submit();";
                                        echo "</script>";
                                }
                            }
                        }
                    }
                    if(((isset($_POST["nombre"]) && $_POST["nombre"] == "") || (isset($_POST["apellidos"]) && $_POST["apellidos"] == "") || (isset($_POST["telefono"]) && $_POST["telefono"] == "") || (isset($_POST["direccion"]) && $_POST["direccion"] == "")) && isset($_POST["precioVenta"])){
                        $precio_total = $_POST["precioVenta"];
                        echo "<h1 class='datos-titPag'>Rellene los datos:</h1>
                        <form action='datosCliente.php' method='post'>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='nombre' class='form-label' maxlength='15'>Nombre</label>
                                                <input type='text' class='form-control' id='nombre' name='nombre' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='apellidos' class='form-label' maxlength='40'>Apellidos</label>
                                                <input type='text' class='form-control' id='apellidos' name='apellidos' maxlength='40'>
                                            </div>
                                        </div>
                                        <div class='row mb-3'>
                                            <div class='col-6'>
                                                <label for='telefono' class='form-label'>Teléfono</label>
                                                <input type='text' class='form-control' id='telefono' name='telefono' maxlength='15'>
                                            </div>
                                            <div class='col-6'>
                                                <label for='text' class='form-label'>Dirección</label>
                                                <input type='text' class='form-control' id='direccion' name='direccion' maxlength='70'>
                                            </div>
                                        </div>
                                        <input type='hidden' name='precioVenta' value='<?php echo $precio_total;?>'>
                                        <p style='color:red;'>Por favor, rellene todos los campos</p>
                                        <input type='submit' value='Continuar' class='datos-btn-continuar'>
                                    </form>";
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>