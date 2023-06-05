<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <script src="administracion.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <?php
    include_once("headerAdm.php");
    ?>
    <div class="container d-flex justify-content-center">
        <div class="contenedor col-12 d-flex flex-column align-content-center align-items-center mt-5">
            <div class="row mt-3">
                <h1>Gestión de inventario</h1>
            </div>
            <div class="row">
                <form action="administracion.php" method="get">
                    <?php
                    $mysqli = new mysqli("localhost", "root", "", "fundamental");
                    if ($mysqli->connect_errno) { 
                        exit();
                    }
                    $result = $mysqli -> query("SELECT distinct nombre FROM producto");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()){
                            echo "<label class='form-check-label'><input class='form-check-input' type=radio name='productos' value=".$row["nombre"]."></input>&nbsp;&nbsp;".$row["nombre"]."</label><br>";
                        }
                    }else{
                        echo "<p>No hay produtos dados de alta</p>";
                    }
                    ?>
                    <input type="submit" value="Gestionar" id="gestionar" class="mt-3">
                    <br>
                </form>
            </div>
            <div class="adm-productos row my-4">
                <div class="col-12">
                    <table class="adm-table">
                        <?php
                        if(isset($_GET['productos'])){
                            $producto = $_GET['productos'];
                            if($producto == "funda"){
                                if($result = $mysqli -> query("SELECT `id_producto`,`nombre`,`stock`,`precio_producto`,`descripcion_producto`,`marca`,`modelo`,`tipo`,`color` FROM producto where nombre='$producto'")){
                                    echo "<table class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th scope='col' class='adm-th'>id</th>
                                        <th scope='col' class='adm-th'>nombre</th>
                                        <th scope='col' class='adm-th'>stock</th>
                                        <th scope='col' class='adm-th'>precio</th>
                                        <th scope='col' class='adm-th'>descripcion</th>
                                        <th scope='col' class='adm-th'>marca</th>
                                        <th scope='col' class='adm-th'>modelo</th>
                                        <th scope='col' class='adm-th'>tipo</th>
                                        <th scope='col' class='adm-th'>color</th>
                                        <th scope='col' colspan='2' class='adm-th'>opción</th>
                                    </tr>
                                    </thead>
                                    <tbody class='adm-cuerpoTabla'>";
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()){
                                            $id = $row["id_producto"];
                                            $nombre = $row["nombre"];
                                            $stock = $row["stock"];
                                            $precio = $row["precio_producto"];
                                            $descripcion = $row["descripcion_producto"];
                                            $marca = $row["marca"];
                                            $modelo = $row["modelo"];
                                            $tipo = $row["tipo"];
                                            $color = $row["color"];
                                            echo "<tr>";
                                            echo "<td class='adm-td'><input type='text' name='id[]' value='$id' class='adm-input' readonly></td>";
                                            echo "<td class='adm-td'><input type='text' name='nombre[]' value='$nombre' class='adm-input' readonly></td>";
                                            echo "<td class='adm-td'><input type='number' name='stock[]' value='$stock' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='precio[]' value='$precio' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='descripcion[]' value='$descripcion' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='marca[]' value='$marca' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='modelo[]' value='$modelo' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='tipo[]' value='$tipo' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='color[]' value='$color' class='adm-input'></td>";
                                            echo "<td class='adm-td'><button onclick='updateProduct($id)' id='act'>Actualizar</button></td>";
                                            echo "<td class='adm-td'><button onclick='deleteProduct($id)' id='eliminar'>Eliminar</button></td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</tbody>
                                    </table>";
                                }
                            }elseif ($producto == "cristal") {
                                if($result = $mysqli -> query("SELECT `id_producto`,`nombre`,`stock`,`precio_producto`,`descripcion_producto`,`marca`,`modelo`,`con_borde` FROM producto where nombre='$producto'")){
                                    echo "<table class='table table-striped'>
                                    <thead>
                                    <tr>
                                        <th scope='col' class='adm-th'>id</th>
                                        <th scope='col' class='adm-th'>nombre</th>
                                        <th scope='col' class='adm-th'>stock</th>
                                        <th scope='col' class='adm-th'>precio</th>
                                        <th scope='col' class='adm-th'>descripcion</th>
                                        <th scope='col' class='adm-th'>marca</th>
                                        <th scope='col' class='adm-th'>modelo</th>
                                        <th scope='col' class='adm-th'>borde</th>
                                        <th scope='col' colspan='2' class='adm-th'>opción</th>
                                    </tr>
                                    </thead>
                                    <tbody class='adm-cuerpoTabla'>";
                                    if ($result->num_rows > 0) {
                                        $c = 0;
                                        while($row = $result->fetch_assoc()){
                                            $id = $row["id_producto"];
                                            $nombre = $row["nombre"];
                                            $stock = $row["stock"];
                                            $precio = $row["precio_producto"];
                                            $descripcion = $row["descripcion_producto"];
                                            $marca = $row["marca"];
                                            $modelo = $row["modelo"];
                                            $borde = $row["con_borde"];
                                            echo "<tr>";
                                            echo "<td class='adm-td'><input type='text' name='id[]' value='$id' class='adm-input' readonly></td>";
                                            echo "<td class='adm-td'><input type='text' name='nombre[]' value='$nombre' class='adm-input' readonly></td>";
                                            echo "<td class='adm-td'><input type='number' name='stock[]' value='$stock' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='precio[]' value='$precio' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='descripcion[]' value='$descripcion' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='marca[]' value='$marca' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='modelo[]' value='$modelo' class='adm-input'></td>";
                                            echo "<td class='adm-td'><input type='text' name='borde[]' value='$borde' class='adm-input'></td>";
                                            echo "<td class='adm-td'><button onclick='updateProduct2($id)' id='act'>Actualizar</button></td>";
                                            echo "<td class='adm-td'><button onclick='deleteProduct($id)' id='eliminar'>Eliminar</button></td>";
                                            echo "</tr>";
                                        }
                                    }
                                    echo "</tbody>
                                    </table>";
                                }
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>