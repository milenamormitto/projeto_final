<?php
class Conexao{
    static $con = null;

    public static function getConnection(){
    $ip = "127.0.0.1";
    $port = "3306";
    $user = "root";
    $pass = "info";
    $db = "db_catalogo3E2";

    if(!self::$con){
        self::$con = new mysqli($ip, $user, $pass, $db, $port);
        if(self::$con->connect_error){
            echo "Ocorreu um erro.". self::$con->connect_error;
        die();
        }
    }
    return self::$con;
    }
}
?>
