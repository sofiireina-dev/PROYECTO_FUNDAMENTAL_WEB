<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoSinFondo.png">
    <title>Pago Completado</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script src="script.js"></script>
</head>

<body>
    <header>
    <?php
    require_once("./header.php");
    ?>
    </header>
    <div class="container mt-5 mx-5">
        <div class="row">
            <?php
            // Para cambiar al entorno de producción usar: www.paypal.com
            $paypal_hostname = 'www.sandbox.paypal.com';

            // El token lo obtenemos en las opciones de nuestra cuenta Paypal cuando activamos PDT
            $pdt_identity_token = 'pV22DcMZporAzVHAHCCM69bpLnyiFiaDCuRfEGwEyeJMBnFL4DbMU32kT1q';

            $tx = $_GET['tx'];

            $query = "cmd=_notify-synch&tx=$tx&at=$pdt_identity_token";

            $request = curl_init();
            // Establecemos las opciones necesarias para realizar la solicitud a paypal
            curl_setopt($request, CURLOPT_URL, "https://$paypal_hostname/cgi-bin/webscr");
            curl_setopt($request, CURLOPT_POST, TRUE);
            curl_setopt($request, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($request, CURLOPT_POSTFIELDS, $query);

            // Opciones recomendadas especialmente en entornos de producción
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, TRUE);
            // Si tu servidor no incluye los certificados verisign predeterminados debes establecer
            // la ruta del certificado verisign cacert.pem, lo puedes descargar en: https://curl.se/docs/caextract.html
            //curl_setopt($request, CURLOPT_CAINFO, __DIR__ . '\cacert.pem');
            curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($request, CURLOPT_HTTPHEADER, array("Host: $paypal_hostname"));

            // Ejecutamos la solicitud
            $response = curl_exec($request);
            curl_close($request);

            if (!$response) {
                //HTTP ERROR
                echo "Error";
                return;
            }

            // Dividimos $response por líneas
            $lines = explode("\n", trim($response));
            $keyarray = array();

            // Validamos la respuesta
            if (strcmp($lines[0], "SUCCESS") == 0) {
                for ($i = 1; $i < count($lines); $i++) {
                    $temp = explode("=", $lines[$i], 2);
                    $keyarray[urldecode($temp[0])] = urldecode($temp[1]);
                }

                // Verificamos que el estado de pago esté Completado
                // Comprobamos que txn_id no ha sido procesado previamente
                // Verificamos que el importe de pago y la moneda de pago sean correctos
            
                // En el siguiente enlace puedes encontrar una lista completa de Variables IPN y PDT.
                // https://developer.paypal.com/docs/api-basics/notifications/ipn/IPNandPDTVariables/
            
                $mc_gross = $keyarray['mc_gross'];
                $payment_status = $keyarray['payment_status'];
                $quantity = $keyarray['quantity'];
                $item_name = $keyarray['item_name'];

                include_once("config.php");
                    $mysqli = new mysqli($host, $user, $pass, $bbdd);

                    if ($mysqli->connect_errno) { //Nos conectamos a la base de datos
                        exit();
                    }

                    $result = $mysqli->query("INSERT INTO venta (fecha_hora_venta, id_cliente) VALUES ('" . date('Y-m-d H:i:s') . "', '" . $mysqli->real_escape_string($_GET["cliente"]) . "')");
                        


                echo "<h1>¡Hemos procesado tu pago exitosamente!</h1> <h3>¡Gracias por comprar en FUNDAMENTAL!</h3><br>
            <p>ℹ️No olvides descargar la factura, la necesitarás para recoger tu pedido.</p>
            Recibimos $mc_gross € en concepto de: $quantity $item_name.<br><br>
            <button class='receptor-btn-factura' onclick='factura()'>Descargar factura</button>
            <br><br><hr><br>
            <p>Vuelve a comprar dando clic <a href='inicio.php'>aquí</a></p>";
                return;
            } else if (strcmp($lines[0], "FAIL") == 0) {
                // Registramos datos para realizar una investigación
                echo "FAIL";
                return;
            }
            ?>
        </div>
    </div>
</body>

</html>