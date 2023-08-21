<?php
require 'admin/config.php';
require 'functions.php';
session_start();

$conexion = Database::connect();

if (isset($_GET['id']) && isset($_GET['categoria'])) {
    $id = $_GET['id'];

    comprobarSessionAdmin();

    $eliminada = eliminar_categoria($conexion, $id);

    if ($eliminada) {
        // Redireccionar a la página después de eliminar
        header('Location:'. RUTAS. 'admin/index.php?admin');
        exit();
    } else {
        // Manejar el error, si es necesario
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}


if (isset($_GET['id']) && isset($_GET['palabra'])) {
    $id = $_GET['id'];
    
    comprobarSessionAdmin();

    $eliminada = eliminar_palabra($conexion,$id);

    if ($eliminada) {
        // Redireccionar a la página después de eliminar
        header('Location:'. RUTAS . 'admin/index.php?palabras');
        exit();
    } else {
        // Manejar el error, si es necesario
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}



if (isset($_GET['palabra']) && isset($_GET['usuario'])) {
    $id_palabra = $_GET['palabra'];
    $id_usuario = $_GET['usuario'];
    
    comprobarSessionAdmin();

    $eliminada = eliminar_palabra_estudiada($conexion, $id_palabra, $id_usuario);

    if ($eliminada) {
        // Redireccionar a la página después de eliminar
        header('Location:'. RUTAS . 'mi_estudio.php?id='.$id_usuario);
        exit();
    } else {
        // Manejar el error, si es necesario
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}

?>