<!DOCTYPE html>
<html lang="en">
<?php

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= RUTAS ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= RUTAS ?>css/estilos.css">
    <link rel="stylesheet" href="<?= RUTAS ?>css/estilosFormulario.css">
    <link rel="stylesheet" href="<?= RUTAS ?>css/estilos_login.css">
    <title>UTN</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <nav class="menu">
                <a href="<?= RUTAS ?>" id="btn-acerca-de">Incio</a>
                <a href="<?= RUTAS ?>admin/index.php?admin" id="btn-acerca-de">Administrador</a>
                <a href="#" id="btn-menu">Estudiar</a>
                <a href="<?= RUTAS ?>cerrar.php?logout=1" id="btn-Objetivo">Cerrar Session</a>
                <a href="<?= RUTAS ?>mostrar_repaso.php" id="btn-Contacto">Informe de Actividad</a>


            </nav>

            <div class="textos">
                <h1 class="nombre">Dominando el Inglés</h1>
                <h3>Aplicando la Curva del Olvido</h3>
            </div>

        </div>
    </header>