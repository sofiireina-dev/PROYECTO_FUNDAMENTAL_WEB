<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Productos</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script src="altaProducto.js"></script>
</head>

<body>
    <?php
    include_once("headerAdm.php");
    ?>
    <div class="container d-flex justify-content-center">
        <div class="alta-contenedor col-12 d-flex flex-column align-items-center mt-5">
            <div class="row mt-3">
                <h1 class="alta-tit">Alta producto</h1>
            </div>
            <div class="row">
                <form action="altaProducto.php" method="post" name="alta" class="alta-form">
                    <label for="productos">Selecciona producto:</label>
                    <select id="productos">
                        <?php
                        $mysqli = new mysqli("localhost", "root", "", "fundamental");
                        if ($mysqli->connect_errno) {
                            exit();
                        }
                        $result = $mysqli->query("SELECT distinct nombre FROM producto");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option name='productos' value=" . $row["nombre"] . ">" . $row["nombre"] . "</input><br>";
                            }
                        } else {
                            echo "<p>No hay produtos dados de alta</p>";
                        }
                        ?>
                    </select>

                    <div class="esconder col-6" id="div-nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="funda/cristal">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-stock">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" placeholder="Cantidad">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-precio">
                        <label for="precio">Precio producto</label>
                        <input type="text" name="precio" id="precio" placeholder="10">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-descripcion">
                        <label for="descripcion">Descripcion</label><br>
                        <textarea name="descripcion" id="descripcion" placeholder="..."
                            style="height: 200px;"></textarea>
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-marca">
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" placeholder="Marca">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-modelo">
                        <label for="modelo">Modelo</label>
                        <input type="text" name="modelo" id="modelo" placeholder="Modelo">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-tipo">
                        <label for="tipo">Tipo</label>
                        <input type="text" name="tipo" id="tipo" placeholder="Tipo">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-color">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" placeholder="Color">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-borde">
                        <label for="borde">Borde</label>
                        <input type="number" name="borde" id="borde" min="1" max="2" placeholder="1->No, 2->Si">
                        <br>
                    </div>
                    <div class="esconder col-6" id="div-categoria">
                        <label for="categoria">Categoria</label>
                        <input type="number" name="categoria" id="categoria" readonly>
                        <br>
                    </div>
                    <br>
                </form>
                <div class="esconder" id="div-crear">
                    <button id="crear" name="crear">Crear</button>
                </div>
                <div id="div-seleccionar">
                    <br>
                    <button id="seleccionar" name="seleccionar">Seleccionar</button>
                </div>
                <?php
                if (
                    isset($_POST["stock"]) && !empty($_POST["stock"])
                    && isset($_POST["descripcion"])
                    && isset($_POST["precio"]) && !empty($_POST["precio"])
                    && isset($_POST["marca"]) && !empty($_POST["marca"])
                    && isset($_POST["modelo"]) && !empty($_POST["modelo"])
                    && isset($_POST["categoria"]) && !empty($_POST["categoria"])
                    && isset($_POST["nombre"]) && !empty($_POST["nombre"])
                ) {
                    $nombre = $_POST["nombre"];
                    $stock = $_POST["stock"];
                    $descripcion = htmlspecialchars($_POST["descripcion"]);
                    $precio = htmlspecialchars($_POST["precio"]);
                    $marca = htmlspecialchars($_POST["marca"]);
                    $categoria = $_POST["categoria"];
                    $modelo = htmlspecialchars($_POST["modelo"]);
                    $mysqli = new mysqli("localhost", "root", "", "fundamental");

                    if ($nombre == "funda") {
                        if (
                            isset($_POST["tipo"]) && !empty($_POST["tipo"])
                            && isset($_POST["color"]) && !empty($_POST["color"])
                        ) {
                            $tipo = htmlspecialchars($_POST["tipo"]);
                            $color = htmlspecialchars($_POST["color"]);

                            if ($mysqli->connect_errno) {
                                exit();
                            }
                            if (
                                $result = $mysqli->query("INSERT INTO producto (`nombre`,`stock`,`precio_producto`,`descripcion_producto`,`marca`,`modelo`,`tipo`,`color`,`id_categoria`) 
                            VALUES ('$nombre','$stock','$precio','$descripcion','$marca','$modelo','$tipo','$color','$categoria')")
                            ) {
                                echo "<a href='altaProducto.php'>Insertar más</a>";
                                echo "
                                <div class='toast-container position-absolute p-3' style='right: 0; top: 0;'>
                                <div class='toast show bg-dark text-white' role='alert' aria-live='assertive' aria-atomic='true'>
                                    <div class='d-flex'>
                                        <div class='toast-body'>
                                            Producto dado de alta.
                                        </div>
                                        <button type='button' class='btn-close btn-close-white me-2 m-auto' aria-label='Close' data-bs-dismiss='toast'></button>
                                    </div>
                                </div>
                                </div>";
                            } else {
                                echo "
                                <div class='toast-container position-absolute p-3' style='right: 0; top: 0;'>
                                <div class='toast show bg-dark text-white' role='alert' aria-live='assertive' aria-atomic='true'>
                                    <div class='d-flex'>
                                        <div class='toast-body'>
                                            Error en el alta.
                                        </div>
                                        <button type='button' class='btn-close btn-close-white me-2 m-auto' aria-label='Close' data-bs-dismiss='toast'></button>
                                    </div>
                                </div>
                                </div>";
                            }
                            $mysqli->close();
                        }
                    } elseif ($nombre == "cristal") {
                        if (isset($_POST["borde"]) && !empty($_POST["borde"])) {
                            $borde = $_POST["borde"];

                            if ($mysqli->connect_errno) {
                                exit();
                            }
                            if (
                                $result = $mysqli->query("INSERT INTO producto (`nombre`,`stock`,`precio_producto`,`descripcion_producto`,`marca`,`modelo`,`con_borde`,`id_categoria`) 
                            VALUES ('$nombre','$stock','$precio','$descripcion','$marca','$modelo','$borde','$categoria')")
                            ) {
                                echo "<a href='altaProducto.php'>Insertar más</a>";
                                echo "
                                <div class='toast-container position-absolute p-3' style='right: 0; top: 0;'>
                                <div class='toast show bg-dark text-white' role='alert' aria-live='assertive' aria-atomic='true'>
                                    <div class='d-flex'>
                                        <div class='toast-body'>
                                            Producto dado de alta.
                                        </div>
                                        <button type='button' class='btn-close btn-close-white me-2 m-auto' aria-label='Close' data-bs-dismiss='toast'></button>
                                    </div>
                                </div>
                                </div>";
                            } else {
                                echo "
                                <div class='toast-container position-absolute p-3' style='right: 0; top: 0;'>
                                <div class='toast show bg-dark text-white' role='alert' aria-live='assertive' aria-atomic='true'>
                                    <div class='d-flex'>
                                        <div class='toast-body'>
                                            Error en el alta.
                                        </div>
                                        <button type='button' class='btn-close btn-close-white me-2 m-auto' aria-label='Close' data-bs-dismiss='toast'></button>
                                    </div>
                                </div>
                                </div>";
                            }
                            $mysqli->close();
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>