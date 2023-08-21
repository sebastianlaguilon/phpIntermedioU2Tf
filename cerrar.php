<?php
session_start();

// Verificar si se ha enviado el parámetro 'logout' a través de la URL
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_destroy();
    header('Location: index.php');
    exit;
}

header('Location:'. RUTAS);
?>