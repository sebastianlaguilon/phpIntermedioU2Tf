<?php session_start();
require 'admin/config.php';
require 'functions.php';

$conexion =  Database::connect();

if (isset($_GET['id'])) {
    $id_usuario = $_GET['id'];



$palabras_estudiar = obtener_palabras_estudiadas_por_usuario($conexion,$id_usuario);

if (empty($palabras_estudiar)) {
    // El array está vacío
   // echo "El array está vacío.";
       header('Location:'. RUTAS . 'mi_estudio.php?sinpalabras=');
        exit();
}
//$resultado = obtener_palabras_estudiadas_por_usuario($conexion, $id_usuario);
$palabras_estudiadas = $resultado["palabras_estudiadas"];
//$hay_palabras = $resultado["hay_palabras"];

/*if ($hay_palabras) {
     header('Location: ' . RUTAS . 'mi_estudio.php?id='.$id_usuario);
     exit();
} else {
    
     header('Location: ' . RUTAS . 'mi_estudio.php?sinpalabras=1');
    exit();
    echo '<h5 class="titulo" id="platillos">No hay palabras para estudiar en este momento</h5>';
}

*/
if ($palabras_estudiar === 0) {
    
    require_once 'views/mi_estudio_view.php';
       header('Location:'. RUTAS . 'views/mi_estudio.php?sinpalabras=');
        exit();
    
 
} else {
    // Aquí puedes mostrar las palabras para estudiar
    require_once 'views/mi_estudio_view.php';
}
require_once 'views/mi_estudio_view.php';

}

require_once 'views/mi_estudio_view.php';