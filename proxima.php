<?php

require 'admin/config.php';
require 'functions.php';

$conexion =  Database::connect();

if(isset($_GET['admin'])){
    $nombreUsuario = $_SESSION['admin'];
}else{
    $nombreUsuario = $_SESSION['user'];
}

if (isset($_GET['id']) && isset($_GET['dias']) && isset($_GET['usuario'])  ) {
    $id_usuario = $_GET['usuario'];
    $id_palabra = $_GET['id'];
    $dias_sumar = $_GET['dias'];

    insertarPalabraEstudiada($conexion, $id_usuario, $id_palabra);

    
  //  modificarFechaRepaso($conexion,$id_usuario, $id_palabra, $dias_sumar);

    // Llamar a la función para modificar la fecha de repaso
    if (modificarFechaRepaso($conexion,$id_usuario, $id_palabra, $dias_sumar)) {
        header("Location:".RUTAS. "mi_estudio.php?id=".$id_usuario);
        exit();
    } else {
        echo "No se pudo modificar la fecha de repaso.";
    }
} else {
    echo "No se proporcionaron todos los datos necesarios.";
}


?>