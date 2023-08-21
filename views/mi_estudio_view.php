<?php
session_start();
require_once 'admin/config.php';
require_once 'views/header.php';
require_once 'functions.php';

// Verificar si hay una sesión iniciada y si se ha establecido la variable 'USER'
if (isset($_SESSION['user'])) {
    $nombreUsuario = $_SESSION['user'];


 //Puedes utilizar $nombreUsuario para mostrar el nombre del usuario u otras acciones para usuarios logueados
} elseif (isset($_SESSION['admin'])) {
    $nombreUsuario = $_SESSION['admin'];
}

?>

<?php
if (isset($_GET['id'])) {
    echo '<h5 class="titulo" id="platillos">Vocabulario Seleccionado por ' . $nombreUsuario . ' para Estudiar</h5>';

} else {
      echo '<h5 class="titulo" id="platillos">Hoy No queda nada para estudiar!! Buen Trabajo ' . $nombreUsuario . '!!</h5>';
}
?>


<section class="main">
    <div class="row flex-wrap">
        <?php foreach ($palabras_estudiar as $palabra) : ?>

            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="card background-image">
                    <img class="card-img-top small-image my-custom-class" src="img/<?= $palabra['imagen'] ?>" alt="">
                    <div class="card-body text-center">
                        <h4 class="card-title">En Español :</h4>
                        <h4> <?= $palabra['espanol'] ?></h4>
                        <h4 class="card-title">In English</h4>
                        <h4> <?= $palabra['ingles'] ?></h4>
                        <p class="card-text"><?= $palabra['fonetica'] ?></p>
                        <a href="repaso.php?id=<?= $palabra['id']; ?>&usuario=<?= $nombreUsuario ?>" class="btn btn-sm btn-primary detalles-btn">Estudiar</a>
                        <a href="actualizar_estado.php?id=<?= $palabra['id']; ?>&aprendida=<?= $nombreUsuario ; ?>" class="btn btn-sm btn-primary detalles-btn">aprendida</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>