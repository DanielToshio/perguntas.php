<?php
namespace App\model;

class ConexaoPerguntas{
    private static $conexaoperguntas;

    private function __construct()
    {
        
    }

    public static function getInstancia(){
        if(!isset(self::$conexaoperguntas)){
            self::$conexaoperguntas = pg_connect("host=pg-bd dbname=per user=user password=example");
            return self::$conexaoperguntas;
        }
    }
}