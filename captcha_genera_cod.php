<?php
session_start();


// Generar el valor del captcha solo si no está almacenado en la sesión
if (!isset($_SESSION['codigo_captcha'])) {
    $nro1 = rand(0,9);
    $nro2 = rand(0,9);
    $nro3 = rand(0,9);
    $letra = array('a', 'h', 'g', 'd','m', 'z','k');
    $simbolo = array('%', '$', '#', '/');
    $mazcla_letra = rand(0, 6);
    $mezcla_simbolo = rand(0, 3);

    $_SESSION['codigo_captcha'] = $nro1 .  $letra[$mazcla_letra] . $nro2 . $simbolo[$mezcla_simbolo] . $nro3;
}
