<?php
$baseUrl = 'http://localhost/PROYECTO_FUNDAMENTAL/tiendaOnline/paypal';
?>

<h1>Ejemplo <small>Formulario de pago</small></h1>

<!-- Para cambiar al entorno de producción usar: https://www.paypal.com/cgi-bin/webscr -->
<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' id='form_pay'>

    <!-- Valores requeridos -->
    <input type='hidden' name='business' value='sb-fjs47t19611591@business.example.com'>
    <input type='hidden' name='cmd' value='_xclick'>

    <input type='hidden' name='item_name' id='' value='Compra en FUNDAMENTAL WEB' required><br>

    <input type='hidden' name='amount' id='' value='2' required><br>

    <input type='hidden' name='currency_code' value='EUR'>

    <input type='hidden' name='quantity' id='' value='1' required><br>

    <input type='hidden' name='lc' value='es_ES'>
    <input type='hidden' name='no_shipping' value='1'>
    <input type='hidden' name='image_url' value='http://localhost/PROYECTO_FUNDAMENTAL/tiendaOnline/img/logoSinFondo.png'>
    <input type='hidden' name='return' value='<?= $baseUrl ?>/receptor.php'>
    <input type='hidden' name='cancel_return' value='<?= $baseUrl ?>/pago_cancelado.php'>

    <hr>

    <button type="submit">Pagar ahora con Paypal!</button>

</form>