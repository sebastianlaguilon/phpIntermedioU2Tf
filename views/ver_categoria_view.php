<?php
require_once 'admin/config.php';
require_once 'views/header.php';
require_once 'functions.php';


?>
<main class="container">
    <?php foreach ($cate as $categoria) : ?>
        <div class="contenedor">
            <h3 class="titulo" id="platillos">Categoria a repasar : <?= $categoria['categoria']; ?></h3>
        </div>
    <?php endforeach ?>

    <div class="row flex-wrap">
        <?php foreach ($palab as $palabra) : ?>
            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="card background-image">
                    <img class="card-img-top small-image my-custom-class" src="img/<?= $palabra['imagen'] ?>" alt="">
                    <div class="card-body text-center">
                        <h4 class="card-title">En Español :</h4>
                        <h4> <?= $palabra['espanol'] ?></h4>
                        <h4 class="card-title">In English</h4>
                        <h4> <?= $palabra['ingles'] ?></h4>
                        <p class="card-text"><?= $palabra['fonetica'] ?></p>
                        <a href="repaso.php?id=<?= $palabra['id']; ?>" class="btn btn-sm btn-primary detalles-btn">Repaso</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once 'footer.php' ?>