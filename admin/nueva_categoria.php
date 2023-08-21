<?php
session_start();
require_once 'config.php';
require_once '../functions.php';
require_once '../captcha_genera_cod.php';
$conexion = Database::connect();

comprobarSessionAdmin();

if (isset($_POST['captcha'])) {
    $codigo_captcha = $_POST['captcha'];

    if ($codigo_captcha == $_SESSION['codigo_captcha']) {

  unset($_SESSION['codigo_captcha']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    mysqli_query($conexion, "INSERT INTO categorias VALUES (DEFAULT, '$categoria')");

    mysqli_close($conexion);
}else{
    unset($_SESSION['codigo_captcha']);
    $mensaje ="Up algo salió mal!! <br> Debes Ingresar una Categoria.";
     header("Location:".RUTAS. "admin/nueva_categoria.php?errorCarga=" . urlencode($mensaje));
}
    }else{
        unset($_SESSION['codigo_captcha']);
        $mensaje = "Código captcha incorrecto. Inténtalo de nuevo.";
         header("Location:".RUTAS. "admin/nueva_categoria.php?errorCaptcha=" . urlencode($mensaje));
    }
}
require '../views/nueva_cat_views.php';


?>


