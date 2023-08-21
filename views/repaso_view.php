<?php session_start();
require_once 'header.php';




// Verificar si hay una sesión iniciada y si se ha establecido la variable 'USER'
if (isset($_SESSION['user'])) {
    $nombreUsuario = $_SESSION['user'];


    // Puedes utilizar $nombreUsuario para mostrar el nombre del usuario u otras acciones para usuarios logueados
} elseif (isset($_SESSION['admin'])) {
    $nombreUsuario = $_SESSION['admin'];
}

$conexion = Database::connect();
?>

</section>
<div class="contenedor">
    <form id="crear1" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $nombreUsuario; ?>" name="usuario">
        <input type="hidden" value="<?php echo $repaso['id']; ?>" name="id">
        <input type="hidden" value="<?php echo $repaso['espanol']; ?>" name="espanol">
        <input type="hidden" value="<?php echo $repaso['ingles']; ?>" name="inglesBd">
        <div class="row py-5">
            <div class="col">
                <div class="border-bottom">
                    <?php if (isset($repaso) && $repaso === "OK") : ?>
                        <p class="text-center text-success">¡Correcto! La palabra fue ingresada para repaso.</p>


                    <?php elseif (isset($status) && $status === "ERROR") : ?>
                     
                    <?php endif; ?>


                    <?php if (isset($nombreUsuario)) { ?>
                        <h1 class="text-center">Escribe la Palabra <?= $repaso['espanol'] ?> en Ingles <?= $nombreUsuario ?></h1>
                        <?php $usuario = obtener_id_usuario_por_nombre($conexion, $nombreUsuario); ?>
                    <?php   } ?>
                </div>
            </div>
        </div>
        <label id="crear" for="nombre">Palabra en Ingles</label>
        <input type="text1" name="ingles" value="" />
        <input type="hidden" value="<?php echo $nombreUsuario; ?>" name="usuario">
        
        <?php if (isset($_GET['usuario'] )||isset($_GET['id'] ) ) : ?>
           <input type="submit" value="Verificar" />
        <?php endif; ?>
        
         <?php if (isset($status) && $status === "ERROR") : ?>
        <input type="submit" value="Intentar otra vez" />
        <?php endif; ?>


        <?php if (isset($status) && $status === "OK") : ?>
            <p class="text-center text-success">¡Correcto! La palabra en inglés es la correcta.</p>


            <tr>
                <td>

                    <a href="proxima.php?id=<?php echo $repaso['id']; ?>&usuario=<?php echo $usuario ?>&dias=3" class="button-small">Repaso En 3 dias</i></a>
                    <a href="proxima.php?id=<?php echo $repaso['id']; ?>&usuario=<?php echo $usuario ?>&dias=7" class="button-small">Repaso En 7 dias</i></a>
                    <a href="proxima.php?id=<?php echo $repaso['id']; ?>&usuario=<?php echo $usuario ?>&dias=30" class="button-small">Repaso En 30 dias</i></a>
                    <a href="<?= RUTAS ?>eliminar.php?palabra=<?php echo $repaso['id']; ?>&usuario=<?php echo $usuario; ?>" class="button-small delete">Eliminar de mi lista de estudio <i class="fas fa-trash-alt"></i></a>
                </td>

            </tr>
        <?php elseif (isset($status) && $status === "ERROR") : ?>
            <p class="text-center text-danger">Vuelve a Repasar la Palabra Mañana.</p>
            <a href="proxima.php?id=<?php echo $repaso['id']; ?>&usuario=<?php echo $usuario ?>&dias=1" class="button-small">Repaso En 1 dia</i></a>
        <?php endif; ?>

    </form>

    <?php require_once 'footer.php'; ?>