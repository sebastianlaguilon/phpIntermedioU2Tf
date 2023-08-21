<!DOCTYPE html>

<?php 
require_once 'functions.php';
//require_once 'views/header.php';

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Raleway:wght@300;400&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Raleway&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-...tu-clave-de-API...==" crossorigin="anonymous">

    <link rel="stylesheet" href="<?=RUTAS?>css/estilo_login.css">
    <title>Registrate</title>
</head>

<body>
    <?php
    require_once 'captcha_genera_cod.php';

    if (isset($_GET['error'])) {
        $mensaje = $_GET['mensaje'];
        echo "hola";
        var_dump($mensaje);
    }
    ?>
    <div class="contenedorlogin">
        <h1 class="titulo">Registrate</h1>
        <hr class="border">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>

            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="pass" class="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="passret" class="password" placeholder="Repetir Contraseña">

            </div>

            <div class="form-group">
                <img src="<?=  RUTAS ?>captcha.php" alt="captcha"></br>
                <i class="icono izquierda fas fa-shield-alt fa-4x"></i><input type="text" name="captcha" class="password_btn" placeholder="Ingresa captcha">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>
            
            <?php
            if (isset($_SESSION['mensajes'])) {
    $mensaje = $_SESSION['mensajes'];
    unset($_SESSION['mensajes']);
    // Ahora puedes usar $mensaje como necesites
}

?>

            <?php if (isset($mensaje)) : ?>

                <div class=""><?php echo $mensaje; ?></div>
               <?php $_SESSION['mensajes'] = null; ?>
            <?php endif; ?>

            <?php if (!empty($errores)) :   ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php
            if (isset($_GET['errorcaptcha'])) : ?>
                <?php $mensaje = $_GET['errorcaptcha']; ?>
                <div class="error">
                    <ul>
                        <?php echo $mensaje; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>
        <p class="texto-registrate">
            ¿ Ya tienes cuenta ?
            <a href="login.php?accion">Iniciar Sesión</a>
        </p>
    </div>
</body>

</html>