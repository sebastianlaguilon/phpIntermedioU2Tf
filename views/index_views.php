<section class="main">
    <section class="acerca-de" id="acerca-de">
        <div class="contenedor">
            <div class="foto">
                <img src="img/curvadelolvido.png" alt="">
            </div>
            <article>
                <h3>Curva del olvido</h3>
                <P>El psicólogo alemán Hermann Ebbinghaus
                    describe cómo olvidamos información con el tiempo si no la revisamos o reforzamos.
                    Para aplicar la curva de olvido al aprendizaje del inglés, es útil seguir algunas
                    estrategias que te ayudarán a retener el conocimiento a largo plazo.</P>
                <P>Si estás aprendiendo nuevas palabras en inglés, revísalas al día siguiente,
                    luego a los tres días, después de una semana, etc. El espaciado de repaso ayuda
                    a consolidar la memoria y refuerza el aprendizaje.</P>
            </article>
        </div>
    </section>




    <section class="menu">
        <div class="contenedor">
            <?php
            if (isset($_GET['status']) && $_GET['status'] === 'noadmin') {
            ?>
                <h5 class="titulo1">No eres Administrador</h5>
                <a href="login.php" class="button-small sessioniniciar">Iniciar Modo Administrador</a>


            <?php
            } else {
            ?>
                <h5 class="titulo1">Bienvenido <?php echo $nombreUsuario; ?></h5>
                <?php
                $id_usuario = obtener_id_usuario_por_nombre($conexion, $nombreUsuario);
                ?>

            <?php }  ?>



            <h5 class="titulo1" id="platillos">Seleciona una Categoria</h5>
        </div>
        <ul class="lista-categorias">
            <!-- Agrega más enlaces según tus categorías -->
            <li class="item-categoria"><a href="mi_estudio.php?id=<?php echo $id_usuario ?>" class="enlace-rectangular">Mi palabras Para Repasar</a></li>
            <li class="item-categoria"><a href="ver_frases.php?id_categoria=1" class="enlace-rectangular">Frases</a></li>
            <?php foreach ($categorias as $categoria) : ?>
                <li class="item-categoria"><a href="ver_categoria.php?id_categoria=<?= $categoria['id'] ?> " class="enlace-rectangular"><?= $categoria['categoria'] ?></a></li>

            <?php endforeach; ?>
        </ul>

        <div class="contenedor">
            <h3 class="titulo" id="platillos">Palabras a Repasar el Día <?php echo date('d/m/Y'); ?></h3>
        </div>
    </section>
<main class="container">
    <div class="row flex-wrap">
        <?php foreach ($palabras as $palabra) : ?>

            <div class="col-12 col-sm-6 col-lg-3 mb-4">
                <div class="card background-image">
                    <img class="card-img-top small-image my-custom-class" src="img/<?= $palabra['imagen'] ?>" alt="">
                    <div class="card-body text-center">
                        <h4 class="card-title">En Español :</h4>
                        <h4> <?= $palabra['espanol'] ?></h4>
                        <h4 class="card-title">In English</h4>
                        <h4> <?= $palabra['ingles'] ?></h4>
                        <p class="card-text"><?= $palabra['fonetica'] ?></p>
                        <a href="repaso.php?id=<?= $palabra['id']; ?>&usuario=<?php echo $nombreUsuario ?>" class="btn btn-sm btn-primary detalles-btn">Estudiar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
    <div class="card">
        <div class="frase">"La vida es como montar en bicicleta. Para mantener el equilibrio, debes seguir adelante."</div>
        <div class="frase">"Life is like riding a bicycle. To keep your balance, you have to keep going."</div>
        <div class="autor">Albert Einstein</div>
    </div>



    <!-- Agrega más cards con diferentes frases y autores según tus necesidades -->
    <section class="contacto" id="contacto"></section>
</section>