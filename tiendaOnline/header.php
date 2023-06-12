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
    <title>Document</title>
    <script src="productos.js"></script>
    <!-- <script src="sesion.js"></script> -->
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid d-flex justify-content-end">
            <a href="inicio.php">
                <img src="../img/logorecortadoSinFondo.png" alt="logo" class="header-foto navbar-brand">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Mostrar / Ocultar Menú">
                <span class="opciones navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="header-pag nav-link" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="header-pag nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Categorías  </a>
                        <ul class="dropdown-menu bg-dark">
                            <li> <a class="header-pag dropdown-item" href="servicios.php"> Servicios </a></li>
                            <li> <a class="header-pag dropdown-item dropdown-toggle" href="./productos.php"> Productos </a>
                                <ul class="submenu dropdown-menu bg-dark">
                                    <li><a class="enlace header-pag dropdown-item" href="./productos.php?id=funda" id="funda" >Fundas</a></li>
                                    <li><a class="enlace header-pag dropdown-item" href="./productos.php?id=cristal" id="cristal">Cristales</a></li>
                                    <!-- <li><a class="enlace header-pag dropdown-item" href="#" id="eTecno">Tecnología</a></li>
                                    <li><a class="enlace header-pag dropdown-item" href="#" id="eAccesorio">Accesorios</a></li> -->
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="header-pag nav-link" href="carrito.php">Carrito</a>
                    </li>
                </ul>
                <form class="d-flex" action="productos.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Buscar" class="header-buscar" aria-label="Buscar" name="buscar">
                    <button class="header-btn btn btn-outline-light" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
</body>

</html>