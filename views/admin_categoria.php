<?php require_once '../views/header.php'; ?>


<div class="contenedor">
    <h3 class="titulo">Gestionar Categorias</h3>
</div>


<a href="<?= RUTAS ?>admin/nueva_categoria.php" class="button-small nuevo"> <i class="fas fa-plus"> Agregar Categorias</i></a>
<a href="<?= RUTAS ?>admin/index.php?palabras" class="button-small user"><i class="fas fa-user">  Administrar Palabras</i></a>
 <a href="<?= RUTAS ?>cerrar.php?logout=1" class="button-small session"><i class="fas fa-sign-out-alt"> Cerrar Session</i></a>


<div class="tablacate">
    <table>
        <tr>
            <th>ID</th>
            <th>Categoria</th>
            <th>Gestionar</th>
        </tr>
        <?php foreach ($categorias as $categoria) : ?>
            <tr>
                <td><?php echo $categoria['id']; ?></td>
                <td><?php echo $categoria['categoria']; ?></td>
                <td>

                    <a href="<?= RUTAS ?>eliminar.php?id=<?php echo $categoria['id']; ?>&categoria" class="button-small delete"><i class="fas fa-trash-alt"></i></a>
                    <a href="<?= RUTAS ?>editar.php" class="button-small"><i class="fas fa-edit"></i></a>
                </td>
            </tr>


        <?php endforeach; ?>
    </table>
</div>



<?php require_once '../views/footer.php' ?>