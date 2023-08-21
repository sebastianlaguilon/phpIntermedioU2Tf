<?php
require_once '../admin/config.php';
require_once '../functions.php';
require_once 'header.php';

$conexion = Database::connect();

$categorias = obtener_categoria($conexion);

?>

<div class="contenedor">
    <form id="crear1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <div class="row py-5">
            <div class="col">
                <div class="border-bottom">
                    <h1 class="text-center">Agregar Palabra</h1>
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
        <label id="crear" for="categoria">Categoria</label>
        <select name="categoria">
            <li> <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo $categoria['id'] ?>" <?= isset($pro) && is_object($pro) && $categoria['id']  == $categoria['categoria'] ? 'selected' : ''; ?>>
                        <?= $categoria['categoria']  ?>
                    </option>
                <?php endforeach; ?>
        </select>

        <label id="crear" for="nombre">Palabra en Español</label>
        <input type="text1" name="espanol" value="" />

        <label id="crear" for="descripcion">Palabra en Ingles</label>
        <input type="text1" name="ingles"></input>

        <label id="crear" for="descripcion">Fonetica</label>
        <input type="text1" name="fonetica"></input>

        <label id="crear" for="nombre">Imagen</label>
        <input type="file" name="thumb" />

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