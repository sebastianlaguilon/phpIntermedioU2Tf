<?php require_once '../views/header.php'; ?>

<div class="contenedor">
    <h3 class="titulo">Gestionar Palabras</h3>
</div>


<a href="<?= RUTAS ?>admin/nuevo.php" class="button-small nuevo"> <i class="fas fa-plus"> Agregar Palabras</i></a>
<a href="<?= RUTAS ?>admin/index.php?admin" class="button-small user"><i class="fas fa-user"></i> Administrar Categorias</a>
<a href="cerrar.php?logout=true" class="button-small session"><i class="fas fa-sign-out-alt"></i> Cerrar Session</a>


<div class="tablacate">

    <table>
        <tr>
            <th>ID</th>
            <th>ESPAÑOL</th>
            <th>INGLES</th>
            <th>FECHA DE REPASO</th>
            <th>ACCIONES</th>
        </tr>
        <?php foreach ($palabras as $palabra) : ?>
            <tr>
                <td><?php echo $palabra['id']; ?></td>
                <td><?php echo $palabra['espanol']; ?></td>
                <td><?php echo $palabra['ingles']; ?></td>
                <td><?php echo $palabra['FECHA_REPASO']; ?></td>
                <td>
                       <a href="<?= RUTAS ?>eliminar.php?id=<?php echo $palabra['id']; ?>&palabra" class="button-small delete"><i class="fas fa-trash-alt"></i></a>
                       <a href="<?= RUTAS ?>editar.php" class="button-small"><i class="fas fa-edit"></i></a>
                </td>
            </tr>


        <?php endforeach; ?>
    </table>

</div>


<?php require_once '../views/footer.php' ?>