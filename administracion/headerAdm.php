<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="headerAdm.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: ./loginAdm.php");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="../img/logorecortadoSinFondo.png" alt="logo" class="header-img navbar-brand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Mostrar / Ocultar Menú">
                <span class="opciones navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="header-pag nav-link" href="inicioAdm.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="header-pag nav-link" href="administracion.php">Gestión</a>
                    </li>
                    <li class="nav-item">
                        <a class="header-pag nav-link" href="altaProducto.php">Añadir</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ">
                        <a class="header-pag nav-link" href="loginAdm.php" data-bs-toggle="modal"
                            data-bs-target="#modal-1">Cerrar Sesión</a>
                        <div class="modal fade" id="modal-1" tabindex="-1" aria-hidden="true"
                            aria-labelledby="label-modal-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Salir</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Está seguro de que desea salir?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" onclick="salir()">Salir</button>
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>