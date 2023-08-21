<?php
require 'admin/config.php';
require 'functions.php';


$conexion = Database::connect();


if (isset($_GET['id']) && isset($_GET['aprendida'])) {
    $nombreUsuario = $_GET['aprendida'];
    $id_usuario = obtener_id_usuario_por_nombre($conexion, $nombreUsuario);
    
    $id_palabra = $_GET['id'];
 
    $cambiarEstado = cambiar_estado($conexion, $id_usuario, $id_palabra);
    
    header("Location:".RUTAS. "mi_estudio.php?id=".$id_usuario);
    exit();

    if ($cambiarEstado) {
        // Redireccionar a la página después de eliminar
        header('Location:'. RUTAS. 'mi_estudio.php');
        exit();
    } else {
        // Manejar el error, si es necesario
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
}


?>