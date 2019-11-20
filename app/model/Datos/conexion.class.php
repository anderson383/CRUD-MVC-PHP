<?php

namespace App\Model\Datos;
use PDO;

class Conexion
{
    private static $conex;
    private function __construct()
    {

    }
    public static function obtenerConexion(){
        Conexion::$conex = new PDO("mysql:host=localhost;dbname=adsi",'root','');
        Conexion::$conex->exec("SET NAMES 'uft8';");
        return Conexion::$conex;
    }
}



















?>