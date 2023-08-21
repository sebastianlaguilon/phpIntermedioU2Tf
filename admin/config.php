<?php


define('RUTAS','https://cursoutnsebas.000webhostapp.com/');

/*class DataBase{
    public static function connect(){
        $db = new mysqli('localhost','root','', 'php_intermedio_536', 3310);
        $db->query("SET NAMES 'UTF8'");

        return $db;
    }
}*/

class DataBase{
    public static function connect(){
        $conexion = new mysqli('localhost','id20691860_sebastian', 'Seb@2934','id20691860_laguilon_sebastian') or exit ("No se pudo conectar a la base de datos");
        $conexion->query("SET NAMES 'UTF8'");
    
        return $conexion;
    }
}

