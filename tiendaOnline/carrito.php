<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script src="carrito2.js"></script>
</head>

<body>
    <header>
        <?php
        session_start();
        require_once("header.php");
        ?>
    </header>
    <div class="container m-md-auto mx-sm-2 mt-md-4 mt-sm-4 mx-3">
        <div class="row">
            <div class="carrito-contenedor">
                <h2>Carrito de compras</h2>
                <p>Por favor, revisa que esté todo correcto y después presiona el botón COMPRAR</p>
                <br>
                <div class="row">
                    <div class="carrito-contenido mx-auto d-flex flex-column">
                        <?php
                        $precio_total = 0;
                        // Mostrar contenido del carrito
                        if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
                            echo "<table class='carrito-tabla table'>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio unitario</th>
                                <th>Precio total</th>
                                <th></th>
                            </tr>";
                            foreach ($_SESSION["carrito"] as $id_producto => $cantidad) {
                                // Obtener detalles del producto desde la base de datos
                                include_once("config.php");
                                $conn = new mysqli($host, $user, $pass, $bbdd);
                                if ($conn->connect_error) {
                                    die("Error de conexión: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM producto WHERE id_producto = $id_producto";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $precio_total_prod = $row["precio_producto"]*$cantidad;
                                    $precio_total += $precio_total_prod;
                                    $stock = $row["stock"];
                                    echo "<tr>";
                                    if($row['nombre'] == "funda"){
                                        echo "<td>".$row['nombre']." ".$row["tipo"]." ".$row["color"] ." ". $row["marca"]." ".$row["modelo"]."</td>
                                        <td>
                                        <button class='input-number-down' onclick='decrementarNumero($id_producto)'>-</button>
                                        <input type='text' class='carrito-cantidad_c' id='cant_".$id_producto."' value='".$cantidad."' min='1' max='".$row["stock"]."' readonly>
                                        <button class='input-number-up' onclick='incrementarNumero($id_producto , $stock )'>+</button>
                                        </td>
                                        <td>".$row["precio_producto"]."€</td>
                                        <td id='precio_$id_producto'>".$precio_total_prod."€</td>
                                        <td>
                                        <button class='productos-btn-carrito' onclick='eliminarDelCarrito(" . $id_producto .")'>
                                        ✖️
                                        </button>
                                        </td>";
                                    }elseif($row['nombre'] == "cristal"){
                                        $borde;
                                        if($row["con_borde"] == 2){
                                            $borde = "con borde";
                                        }else{
                                            $borde = "sin borde";
                                        }
                                        echo "<td>".$row['nombre']." ".$borde." ". $row["marca"]." ".$row["modelo"]."</td>
                                        <td>
                                        <button class='input-number-down' onclick='decrementarNumero($id_producto)'>-</button>
                                        <input type='number' class='carrito-cantidad_c' id='cant_".$id_producto."' value='".$cantidad."' min='1' max='".$row["stock"]."' readonly>
                                        <button class='input-number-up' onclick='incrementarNumero($id_producto , $stock)'>+</button>
                                        </td>
                                        <td>".$row["precio_producto"]."€</td>
                                        <td id='precio_$id_producto'>".$precio_total_prod."€</td>
                                        <td>
                                        <button class='productos-btn-carrito' onclick='eliminarDelCarrito(" . $id_producto .")'>
                                        ✖️
                                        </button>
                                        </td>";
                                    }
                                    
                                    echo "</tr>";
                                }

                                $conn->close();
                            }

                            // Botón para procesar la compra
                            // echo "<form action='procesar_compra.php' method='POST'>
                            //         <input type='submit' value='Procesar compra'>
                            //     </form>";
                            echo "</table>
                            <h5 id='productos_total'>Precio total: <span id='precio_total_valor'>".$precio_total."</span>€</h5>";
                            echo "<div class='row mt-3'>
                            <div class='col-12 d-flex justify-content-end'>
                                    <button class='carrito-btn-vaciar' onclick='vaciarCarrito()'>
                                        ✖️ VACIAR CARRITO
                                    </button>


                                    <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' id='form_pay'>

                                        <input type='hidden' name='business' value='sb-fjs47t19611591@business.example.com'>
                                        <input type='hidden' name='cmd' value='_xclick'>
                                    
                                        <input type='hidden' name='item_name' id='' value='Compra en FUNDAMENTAL WEB' required>
                                    
                                        <input type='hidden' name='amount' id='' value='$precio_total' required>
                                    
                                        <input type='hidden' name='currency_code' value='EUR'>
                                    
                                        <input type='hidden' name='quantity' id='' value='1' required>
                                    
                                        <input type='hidden' name='lc' value='es_ES'>
                                        <input type='hidden' name='no_shipping' value='1'>
                                        <input type='hidden' name='image_url' value='http://localhost/PROYECTO_FUNDAMENTAL/tiendaOnline/img/logoSinFondo.png'>
                                        <input type='hidden' name='return' value='http://localhost/PROYECTO_FUNDAMENTAL/tiendaOnline/receptor.php'>
                                    
                                        
                                        <button class='carrito-btn-comprar' type='submit'>
                                            🛒 TRAMITAR COMPRA
                                        </button>
                                    
                                    </form>
                            </div>
                            </div>";
                        } else {
                            echo "
                            <div class='row mt-6 mx-auto d-flex flex-wrap'>
                                <img src='../img/cesta.png' class='carrito-cesta'>
                            </div>
                            <div class='row mt-1 mx-auto d-flex flex-wrap'>
                                <p class='ms-auto text-secondary'>El carrito está vacío</p>
                            </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
