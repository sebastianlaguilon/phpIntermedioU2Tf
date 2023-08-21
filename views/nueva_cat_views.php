<?php
require_once '../admin/config.php';
require_once 'header.php';


?>

<div class="contenedor">
    <form id="crear1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="row py-5">
            <div class="col">
                <div class="border-bottom">
                    <h1 class="text-center">Nueva Categoria</h1>
                    <?php
                    if (isset($_GET['errorCarga'])) : ?>
                        <?php $mensaje = $_GET['errorCarga']; ?>
                        <div class="border-bottom">
                            <h3 class="text-center"> <?php echo $mensaje; ?></h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <label id="crear" for="nombre">Ingresa nueva Categoria</label>
        <input type="text1" name="categoria" value="" placeholder="Ingresa Categoria" />


        <label id="crear" for="descripcion">Captcha <img src="<?= RUTAS ?>captcha.php" alt="captcha"></label>
        <input type="text1" name="captcha" placeholder="Ingresa captcha"></input>

        <?php
        if (isset($_GET['errorCaptcha'])) : ?>
            <?php $mensaje = $_GET['errorCaptcha']; ?>
            <div class="border-bottom">
                <h3 class="text-center"> <?php echo $mensaje; ?></h3>
            </div>
        <?php endif; ?>

        <input type="submit" value="Guardar" />

    </form>
</div>