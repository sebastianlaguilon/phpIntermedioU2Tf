<?php session_start();
require_once 'admin/config.php';

$conexion = Database::connect();
$errores = '';
if (isset($_GET['accion'])) {
    header('Location:index.php');
    exit;
}

if (isset($_GET['mensaje'])) {
    $mensaje = $_GET['mensaje'];

    header('Location:index.php?mensaje=' . urlencode($mensaje));
    exit;
}
   /* var_dump($mensaje);
    header("Location: views/login_view.php?mensaje=" . urlencode($mensaje));
    exit;
}*/


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$consultation = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$password' ");


if ($consultation) {

    if (mysqli_num_rows($consultation) > 0) {
        // Obtener los datos de la fila (asociativo)
        $datosUsuario = mysqli_fetch_assoc($consultation);

        // Ahora puedes acceder a los datos como un array asociativo
        $UsuarioBD = $datosUsuario['usuario'];
      
        $passBD = $datosUsuario['pass'];
       
        $rolBD = $datosUsuario['rol'];

        $idBD = $datosUsuario['id'];

        if($usuario == $UsuarioBD && $password == $passBD && $rolBD == 'user'){
            session_start();
            $_SESSION['user'] = $_POST['usuario'];
              $datosUsuario = $_SESSION['user'];
           
            header('Location:index.php');
            exit;
        }elseif($usuario == $UsuarioBD && $password == $passBD && $rolBD == 'admin') {
            session_start();
            $_SESSION['admin'] = $_POST['usuario'];
            $datosUsuario = $_SESSION['admin'];
        
            header('Location:index.php?admin');
            exit;
             
        }else{
            header('Location:index.php?error');
        }
    }
    header('Location:index.php?error');
}
}else{
    //session_destroy();
    header('Location:index.php?iniadm1');
}


