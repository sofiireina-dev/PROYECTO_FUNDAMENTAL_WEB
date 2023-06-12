<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
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
                if (isset($_POST["precio"]) && isset($_POST["cliente"])) {
                    $precio_total = $_POST["precio"];
                    $id_cli = $_POST["cliente"];
                    echo "<p>Pulse el botón para pagar</p>
                    <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' id='form_pay'>

                        <input type='hidden' name='business' value='sb-fjs47t19611591@business.example.com'>
                        <input type='hidden' name='cmd' value='_xclick'>
                    
                        <input type='hidden' name='item_name' id='' value='Compra en FUNDAMENTAL WEB' required>
                    
                        <input type='hidden' name='amount' id='' value='$precio_total' required>
                    
                        <input type='hidden' name='currency_code' value='EUR'>
                    
                        <input type='hidden' name='quantity' id='cantidad' value='1' required>
                    
                        <input type='hidden' name='lc' value='es_ES'>
                        <input type='hidden' name='no_shipping' value='1'>
                        <input type='hidden' name='return' value='https://tiendafundamental.duckdns.org/receptor.php?cliente=$id_cli'>
                    
                        
                        <button class='carrito-btn-comprar' type='submit'>
                            💰 PAGAR  &nbsp;
                        </button>
                    
                    </form>";
                }
            ?>
            </div>
        </div>
    </div>
</body>
</html>