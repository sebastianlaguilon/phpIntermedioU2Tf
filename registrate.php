<?php
session_start();
require_once 'admin/config.php';
require_once 'views/header.php'; 
require_once 'views/registrate_view.php';
require_once 'functions.php';
require_once 'captcha_genera_cod.php';


$conexion = Database::connect();

if (isset($_POST['captcha'])) {
    $codigo_captcha = $_POST['captcha'];
    if ($codigo_captcha == $_SESSION['codigo_captcha']) {
       $hola = $_SESSION['codigo_captcha'];
      
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los valores enviados desde el formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $repetirPass = $_POST['passret'];
    $codigo_captcha = $_POST['captcha']; // Obtener el valor del captcha ingresado
    
    // Comparar el captcha ingresado con el captcha generado
    if(isset($codigo_captcha) == isset( $_SESSION['codigo_captcha'])) {
        unset($_SESSION['codigo_captcha']);
        $mensaje = ingresar_usuario($conexion, $usuario, $pass, $repetirPass);
       // unset($_SESSION['codigo_captcha']);
        //header("Location: login.php?user=" . urlencode($mensaje));
       //  die();
         
          $mensaje = "Su registro fue exitoso!!Ingrese como usuario.";
          $_SESSION['mensajes'] = $mensaje;
          header("Location: registrate.php");
          exit;
         
    } else {
        // El código captcha es incorrecto
    }
}
    
}else {
$mensaje = "Código captcha incorrecto. Inténtalo de nuevo.";
$_SESSION['mensajes'] = $mensaje;
header("Location: registrate.php?error");
exit;
     }

}




require_once 'views/footer.php' ; 


?>
