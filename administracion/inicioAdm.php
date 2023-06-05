<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <header>
        <?php
        require_once("headerAdm.php");
        ?>
    </header>
    <div class="container d-flex justify-content-center">
        <div class="contenedor col-12 d-flex flex-column align-content-center align-items-center mt-5">
            <div class="row mt-3">
                <h1>Todos los productos</h1>
            </div>
            <div class="inicio-productos row my-4">
                <div class="col-12">
                    <?php
                    $conn = new mysqli("localhost", "root", "", "fundamental");

                    // Verificar si hay errores de conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta para seleccionar todos los datos de la tabla producto
                    $sql = "SELECT * FROM producto order by nombre asc, marca asc, modelo asc";
                    $resultado = $conn->query($sql);

                    // Crear la tabla HTML y mostrar los datos de la base de datos
                    if ($resultado->num_rows > 0) {
                        echo "<table class='table table-striped'><tr>";
                        // Mostrar los nombres de los campos como encabezado de la tabla
                        $fila = $resultado->fetch_assoc();
                        foreach ($fila as $campo => $valor) {
                            echo "<th>" . $campo . "</th>";
                        }
                        echo "</tr>";
                        // Mostrar los datos de la tabla
                        do {
                            echo "<tr>";
                            foreach ($fila as $campo => $valor) {
                                echo "<td>" . $valor . "</td>";
                            }
                            echo "</tr>";
                        } while ($fila = $resultado->fetch_assoc());
                        echo "</table>";
                    } else {
                        echo "No se encontraron resultados.";
                    }

                    // Cerrar la conexión a la base de datos
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>