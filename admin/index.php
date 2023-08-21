<?php session_start();
require 'config.php';
require '../functions.php';

$conexion = Database::connect();


if (isset($_GET['admin'])) {

 //comprobarSession();
   comprobarSessionAdmin();

    $categorias = obtener_categoria($conexion);

    require_once '../views/admin_categoria.php';

}elseif (isset($_GET['palabras'])) {

     comprobarSession();
  
      $palabras = obtener_palabras($conexion);
  
      require_once '../views/admin_palabras.php';
  
} else {

     require_once '../views/admin_index.php';

}

