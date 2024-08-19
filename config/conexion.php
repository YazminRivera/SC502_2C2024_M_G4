<?php 
    require_once 'global.php';
    class conexion{
        function __construct(){
        }

        public static function conectar(){
            try {
                $cn = new PDO("mysql:host=" . db_host . ";dbname=" . db_name . "; charset=UTF8", db_user, db_pass);
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $cn;
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }
        }
    }
?>