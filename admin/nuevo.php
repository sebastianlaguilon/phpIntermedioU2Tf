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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['espanol']) && isset($_POST['ingles']) && !empty($_POST['espanol']) && !empty($_POST['ingles'])) {
  $p_español = $_POST['espanol'];
  $p_ingles = $_POST['ingles'];
  $fonetica = $_POST['fonetica'];

  $nombre_img = $_FILES['thumb']['name']; // Nombre real del archivo
  $size_img = $_FILES['thumb']['size']; // Tamaño del archivo
  $tipo_img = $_FILES['thumb']['type']; // Tipo MIME del archivo
  $tmp_img = $_FILES['thumb']['tmp_name']; // Nombre temporal del archivo


  $categoria = $_POST['categoria'];
  
  
  // Obtener la fecha actual en formato de base de datos (YYYY-MM-DD)
  $fecha_actual = date('Y-m-d');

  $carpeta_destino = '../img/';

  if(($tipo_img !='image/jpge' && $tipo_img !='image/jpg' && $tipo_img != 'image/png' && $tipo_img != ['image/gif']) or $size_ing > 200000)
  {
       unset($_SESSION['codigo_captcha']);
  $mensaje ="Up algo salió mal!! <br>verifique la imagen .";
   header("Location:".RUTAS. "admin/nuevo.php?errorCarga=" . urlencode($mensaje));
  }else{
       $archivo_subido = $carpeta_destino . $nombre_archivo;
  move_uploaded_file($tmp_img, $archivo_subido);

  mysqli_query($conexion, "INSERT INTO palabras VALUES (DEFAULT, '$p_español', '$p_ingles', '$nombre_img', '$fonetica', '$fecha_actual',$categoria)");

  mysqli_close($conexion);
  }

  
}else{
  unset($_SESSION['codigo_captcha']);
  $mensaje ="Up algo salió mal!! <br> Los campos Español e Inglés son obligatorios.";
   header("Location:".RUTAS. "admin/nuevo.php?errorCarga=" . urlencode($mensaje));
}

  }else{
    unset($_SESSION['codigo_captcha']);
    $mensaje = "Código captcha incorrecto. Inténtalo de nuevo.";
     header("Location:".RUTAS. "admin/nuevo.php?errorCaptcha=" . urlencode($mensaje));
     
  }


}

require '../views/nuevo_views.php';        


?>


