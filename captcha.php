<?php
require_once './captcha_genera_cod.php';

header("Content-type:image/jpeg");

$imagen_captcha = imagecreate(100,30);

$fondo = imagecolorallocate($imagen_captcha,200,200,200);
$texto = imagecolorallocate($imagen_captcha,0,0,255);


imagestring($imagen_captcha, 5, 15,5,$_SESSION['codigo_captcha'],$texto);

imagejpeg($imagen_captcha);