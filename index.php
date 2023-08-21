<?php
session_start();
require_once 'admin/config.php';
require_once 'views/header.php';
require_once 'functions.php';
require_once 'login.php';

date_default_timezone_set('America/Argentina/Buenos_Aires');



if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'ok') {
    echo '<div id="mensaje" class="mensaje">La fecha de repaso se modificó correctamente.</div>';
}


$conexion = Database::connect();

$palabras = obtener_palabras($conexion);

foreach ($palabras as $palabra) {
}

$categorias = obtener_categoria($conexion);

foreach($categorias as $categoria){

}


// Verificar si hay una sesión iniciada y si se ha establecido la variable 'admin'
if (isset($_SESSION['user'])) {
    $nombreUsuario = $_SESSION['user'];
 
   require_once 'views/index_views.php';
// Puedes utilizar $nombreUsuario para mostrar el nombre del usuario u otras acciones para usuarios logueados
}elseif(isset($_SESSION['admin'])){
    $nombreUsuario = $_SESSION['admin'];

    require_once 'views/index_views.php';
}else {
       if(isset($_GET['error'])){
        $error = "Error al iniciar la session";
        require_once 'views/login_view.php';
       }

// No se ha iniciado sesión, redirigir a la página de inicio de sesión para visitantes

require_once 'views/login_view.php';
   
}
?>

<body>
<main class="container" >

</main>

</body>

<script src="js/jquery.com_jquery-3.7.0.min.js"></script>
<script src="js/efectos.js"></script>
<script src="js/parallax.js"></script>
<script>
    // Función para mostrar el mensaje y luego ocultarlo después de 3 segundos (3000 ms)
    function mostrarMensaje() {
        var mensajeElement = document.getElementById('mensaje');
        mensajeElement.style.display = 'block'; // Mostrar el mensaje

        // Ocultar el mensaje después de 3 segundos
        setTimeout(function() {
            mensajeElement.style.display = 'none';
        }, 3000); // 3000 ms = 3 segundos
    }

    // Llamar a la función para mostrar el mensaje si se recibió la variable GET 'mensaje' con valor 'ok'
    if (window.location.search.indexOf('mensaje=ok') !== -1) {
        mostrarMensaje();
    }
</script>

</body>

<?php require_once 'views/footer.php' ; ?>
</html>