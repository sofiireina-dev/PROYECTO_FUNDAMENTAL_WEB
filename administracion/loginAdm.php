<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Inicio sesión</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <script src="loginAdm.js"></script>
</head>

<body class="login-Body">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto login-box">
                <div class="row">
                    <div class="col-lg-12 divLogo">
                        <img src="../img/logoSinFondo.png" alt="" class="logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 login-title">
                        ADMIN PANEL
                    </div>
                </div>
                <form action="loginAdm.php" method="get" id="form" name="form" class="col-lg-12 login-form" autocomplete="off">
                    <div class="row">
                        <div class="col-lg-8 m-auto form-group">
                            <label for="user" class="form-control-label">USERNAME</label>
                            <input type="text" class="login-input form-control" name="user" id="user">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 m-auto form-group">
                            <label for="pass" class="form-control-label">PASSWORD</label>
                            <input type="password" class="login-input form-control" name="pass" id="pass">
                        </div>
                    </div>
                    <div class="row m-auto d-flex justify-content-center text-center">
                        <p id="noExiste" class="ocultar">Datos erróneos</p>
                    </div>
                    <div class="row">
                        <div class="col-3 m-auto mt-3 d-flex justify-content-center">
                            <input type="submit" value="LOGIN" class="login-boton" id="boton">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    <?php
        if (isset($_GET["user"])&&isset($_GET["pass"])) {
            $usu = $_GET["user"];
            $passw = md5($_GET["pass"]);

            require_once("config.php");
            $mysqli = new mysqli($host, $user, $pass, $bbdd);

            if ($mysqli->connect_errno) { //Nos conectamos a la base de datos
                die();
            }
            if($result = $mysqli -> query("SELECT cuenta_adm FROM empleado WHERE cuenta_adm='$usu' AND pass='$passw'")){ //Se hace un select para ver si existe mi usuario
                if($result->num_rows>0){
                    session_start();
                    $_SESSION["usuario"] = $usu;
                    $mysqli->close();
                    echo("hecho");
                    header("Location: inicioAdm.php");
                }else{
                    echo '<script>mostrarError();</script>';
                    $mysqli->close();
                }
            }else{
                die();
            }
        }
    ?>
</body>

</html>