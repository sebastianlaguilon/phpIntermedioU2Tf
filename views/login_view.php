<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Raleway:wght@300;400&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Raleway&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-...tu-clave-de-API...==" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= RUTAS ?>css/estilo_login.css"> 
    <title>Iniciar Sesion</title>
</head>

<body>

    <div class="contenedorlogin">
        <?php if (isset($error)) { ?>
            <h1 class="titulo">UP!!! <br> Intentelo otra vez!!</h1>
        <?php } elseif (isset($_GET['iniadm'])) {  ?>
            <h1 class="titulo">inicia administrador!!</h1>

        <?php } elseif (isset($_GET['mensaje'])) { ?>
            <?php $mensaje = $_GET['mensaje']; ?>
            <div class="error">
                <ul>
                    <h1 class="titulo"><?php echo $mensaje; ?></br>Inice Session</h1>
                </ul>
            </div>

        <?php } else {  ?>
            <h1 class="titulo">Iniciar Session</h1>
        <?php  }    ?>

        <hr class="border">

        <form action="login.php" method="POST" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario" require>
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password_btn" placeholder="Contraseña">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>

            <?php if (!empty($errores)) :   ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>

        <p class="texto-registrate">
            ¿ Aun no tienes cuenta ?
            <a href="registrate.php">Registrate</a>
        </p>
    </div>
</body>

</html>