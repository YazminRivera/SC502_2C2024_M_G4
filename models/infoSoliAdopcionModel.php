<?php
require_once '../config/Conexion.php';

class infoSoliAdopcionModel extends Conexion{
    protected static $cnx;
    private $idSoli = null;
    private $idAnimal = null;
    private $idUsuario = null;
    private $nombre = null;
    private $correo = null;
    private $direccion = null;
    private $telefono = null;

    //getters y setters
    public function getIdSoli(){
        return $this-> idSoli;
    }
    public function setIdSoli($idSoli){
        $this-> idSoli = $idSoli;
    }

    public function getIdAnimal(){
        return $this-> idAnimal;
    }
    public function setIdAnimal($idAnimal){
        $this-> idAnimal = $idAnimal;
    }

    public function getIdUsuario(){
        return $this-> idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this-> idUsuario = $idUsuario;
    }    

    public function getNombre(){
        return $this-> nombre;
    }
    public function setNombre($nombre){
        $this-> nombre = $nombre;
    }
    
    public function getCorreo(){
        return $this-> correo;
    }
    public function setCorreo($correo){
        $this-> correo = $correo;
    }

    public function getDireccion(){
        return $this-> direccion;
    }
    public function setDireccion($direccion){
        $this-> direccion = $direccion;
    }

    public function getTelefono(){
        return $this-> telefono;
    }
    public function setTelefono($telefono){
        $this-> telefono = $telefono;
    }

    //conexión y desconectar
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar(){
        self::$cnx = null;
    }

    //función listar
    public function listarSolis(){
        $query = "SELECT idSoliAdopcion, idAnimal, idUsuario, nombre, correo, direccion, telefono FROM sc502soliadopcion";
    $arr = array();
    try{
        self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach($resultado->fetchAll() as $encontrado){
                    $datos = new infoSoliAdopcionModel();      
                    $datos->setIdSoli($encontrado['idSoliAdopcion']);  
                    $datos->setIdAnimal($encontrado['idAnimal']);  
                    $datos->setIdUsuario($encontrado['idUsuario']);  
                    $datos->setNombre($encontrado['nombre']);
                    $datos->setCorreo($encontrado['correo']);
                    $datos->setDireccion($encontrado['direccion']);
                    $datos->setTelefono($encontrado['telefono']);
                    $arr[] = $datos;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }
}
?>

