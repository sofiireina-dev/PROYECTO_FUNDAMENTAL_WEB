<?php
if (isset($_POST["eliminar"])) {
    session_start();
    session_destroy();
}