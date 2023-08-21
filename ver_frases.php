<?php
require_once 'admin/config.php';
require_once 'views/header.php';
require_once 'functions.php';
$conexion =  Database::connect();






// Comprobar si se recibió el parámetro 'id_categoria' por GET
if (isset($_GET['id_categoria'])) {
    // Obtener el valor del parámetro 'id_categoria'
    $id_categoria =$_GET['id_categoria'];
  
if (!$conexion){
    header('Location:error.php');
}

if(empty($id_categoria)){
    header('Location: index.php');
    
}
/*
$palab = obtener_palabras_por_categoria($conexion, $id_categoria);
$cate = obtener_una_categoria($conexion,$id_categoria);

if(!$palab){
    header('Location: index.php');
}
*/
require 'views/ver_frases_views.php';

} else {
    // El parámetro 'id_categoria' no fue proporcionado en el URL
    echo "No se proporcionó el parámetro 'id_categoria'.";
}

?>