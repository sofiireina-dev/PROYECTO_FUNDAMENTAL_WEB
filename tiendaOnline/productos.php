
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="script.js?v=2"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <header>
        <?php
        require_once("header.php");
        ?>
    </header>
    <div class="container mt-5">
        <div class="row">
            <?php
            if(isset($_GET["id"])){
                $nombre = $_GET["id"];
                $prod = "";
                if ($nombre == "funda") {
                    $prod = " fundas ";
                } elseif ($nombre = "cristal") {
                    $prod = " cristales ";
                } elseif ($nombre = "tecnologia") {
                    $prod = " productos de tecnología ";
                }
                if (isset($_GET["filtro"])) {
                    $filtro = $_GET["filtro"];
                    $query = "SELECT * FROM producto WHERE nombre='$nombre' order by precio_producto $filtro";
                }else{
                    $query = "SELECT * FROM producto WHERE nombre='$nombre'";
                }
                echo "<div class='row'>
                <h2 class='productos-titPag col-11'>Resultados:</h2>
                <li class='nav-item dropdown col-1' id='myDropdown2' style='list-style-type:none;'>
                    <a class='header-pag nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>  Filtros  </a>
                    <ul class='dropdown-menu bg-dark'>
                        <li> <a class='header-pag dropdown-item' href='productos.php?id=$nombre&filtro=asc'> Precio de menor a mayor </a></li>
                        <li> <a class='header-pag dropdown-item' href='productos.php?id=$nombre&filtro=desc'> Precio de mayor a menor </a></li>

                    </ul>
                </li>
                </div>
                ";
            }elseif(isset($_GET["buscar"])){
                $searchTerm = htmlspecialchars($_GET["buscar"]) ;
                $keywords = explode(" ", $searchTerm);
                $conditions = array();
                foreach ($keywords as $keyword) {
                    if (substr($keyword, -2) == 'es') {
                        $keyword = rtrim($keyword, 'es');
                    }elseif (substr($keyword, -1) == 's') {
                        $keyword = rtrim($keyword, 's');
                    }
                    $conditions[] = "LOWER(descripcion_producto) LIKE LOWER('%$keyword%')";
                }
                if (isset($_GET["filtro"])) {
                    $filtro = $_GET["filtro"];
                    $query = "SELECT * FROM producto WHERE " . implode(" AND ", $conditions)." order by precio_producto $filtro";
                }else{
                    $query = "SELECT * FROM producto WHERE " . implode(" AND ", $conditions);
                }
                echo "<div class='row'>
                <h2 class='productos-titPag col-11'>Resultados:</h2>
                <li class='nav-item dropdown col-1' id='myDropdown2' style='list-style-type:none;'>
                    <a class='header-pag nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>  Filtros  </a>
                    <ul class='dropdown-menu bg-dark'>
                        <li> <a class='header-pag dropdown-item' href='productos.php?buscar=$searchTerm&filtro=asc'> Precio de menor a mayor </a></li>
                        <li> <a class='header-pag dropdown-item' href='productos.php?buscar=$searchTerm&filtro=desc'> Precio de mayor a menor </a></li>
                    </ul>
                </li>
                </div>
                ";
            }else{
                if (isset($_GET["filtro"])) {
                    $filtro = $_GET["filtro"];
                    $query = "SELECT * FROM producto order by precio_producto $filtro";
                }else{
                    $query = "SELECT * FROM producto";
                }
                echo "<div class='row'>
                <h2 class='productos-titPag col-11'>Resultados: </h2>
                <li class='nav-item dropdown col-1' id='myDropdown2' style='list-style-type:none;'>
                    <a class='header-pag nav-link dropdown-toggle' href='#' data-bs-toggle='dropdown'>  Filtros  </a>
                    <ul class='dropdown-menu bg-dark'>
                        <li> <a class='header-pag dropdown-item' href='productos.php?filtro=asc'> Precio de menor a mayor </a></li>
                        <li> <a class='header-pag dropdown-item' href='productos.php?filtro=desc'> Precio de mayor a menor </a></li>

                    </ul>
                </li>
                </div>
                ";
            }
            
            include_once("config.php");
            $mysqli = new mysqli($host, $user, $pass, $bbdd);

            if ($mysqli->connect_errno) { //Nos conectamos a la base de datos
                exit();
            }
            ?>
        </div>
        <div class="row mt-4">
            <?php
            
            if ($result = $mysqli->query($query)) {
                foreach ($result as $n) {
                    if($n["nombre"] == "funda"){
                        if (file_exists("../img/productos/".$n['nombre']."/".$n["marca"].$n["modelo"].$n["tipo"].$n["color"].".png")) {
                            $ruta_img = "../img/productos/".$n['nombre']."/".$n["marca"].$n["modelo"].$n["tipo"].$n["color"].".png";
                            
                        }else{
                            $ruta_img = '../img/noImage.png';
                        }
                    }elseif($n["nombre"] == "cristal"){
                        if (file_exists("../img/productos/".$n['nombre']."/".$n["marca"].$n["modelo"].$n["con_borde"].".png")) {
                            $ruta_img = "../img/productos/".$n['nombre']."/".$n["marca"].$n["modelo"].$n["con_borde"].".png";
                            
                        }else{
                            $ruta_img = '../img/noImage.png';
                        }
                    }
                    $id_producto = $n["id_producto"];
                    echo "<div class='productos-tarjeta col-lg-3 col-md-4 col-sm-12 mx-auto d-flex flex-column align-items-end'>
                            <div class='row mt-1 d-flex flex-wrap'>
                                <img src='$ruta_img' alt='fail' class='productos-img-prod img-fluid'>
                                <h5 class='productos-nProd mt-2'>" . ucwords($n["nombre"]) . " " . strtoupper($n["marca"] . " " . $n["modelo"]) . "</h5>
                            </div>
                            
                            <div class='productos-descrip row mt-auto d-flex flex-wrap'>
                                <p class='productos-dProd mb-1'>" . $n["descripcion_producto"] . "</p>
                                <p class='productos-dProd mt-1'>Precio unidad: " . $n["precio_producto"] . "€</p>
                            </div>
                            <div>
                            <label for='cantidad' class='productos-cProd'>Cantidad:</label>
                            <button class='input-number-down' onclick='productos_decrementarNumero($id_producto , ".$n["stock"].")'>-</button>
                            <input type='text' name='cantidad' id='cantidad_". $n["id_producto"] ."' class='productos-cantidad m-auto' value='1' min='1' max='" . $n["stock"] . "' readonly></input>
                            <button class='input-number-up' onclick='productos_incrementarNumero($id_producto , ".$n["stock"].")'>+</button>
                            <button class='productos-btn-carrito' onclick='agregarAlCarrito(".$n["id_producto"].")'>
                                <img id='img-carrito" . $n["id_producto"] . "'src='../img/carrito.png' alt=''>
                            </button>
                            </div>
                        </div>";
                }
            } 
            $mysqli->close();
            ?>
        </div>
    </div>
</body>

</html>