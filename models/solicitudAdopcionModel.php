<?php

require_once '../config/Conexion.php';

class solicitudAdopcionModel extends Conexion
{
    protected static $cnx;

    private $idSoli;
    private $idAnimal;
    private $idUsuario;
    private $nombre;
    private $correo;
    private $direccion;
    private $telefono;
    private $boolSoli;

    //getters y setters
    //idSoli
    public function getIdSoli(){
        return $this->idSoli;
    }

    public function setIdSoli($idSoli){
        $this->idSoli = $idSoli;
    }

    //idAnimal
    public function getIdAnimal(){
        return $this->idAnimal;
    }

    public function setIdAnimal($idAnimal){
        $this->idAnimal = $idAnimal;
    }

    //idUsuario
    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    //nombre
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    //correo
    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    //direccion
    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    //telefono
    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    //boolSoli
    public function getBoolSoli(){
        return $this->boolSoli;
    }

    public function setBoolSoli($boolSoli){
        $this->boolSoli = $boolSoli;
    }

    //constructor
    public function __construct(){
    }

    //obtener conexion
    public static function getConexion(){
        self::$cnx = Conexion::conectar();
    }

    //desconectar
    public static function desconectar(){
        self::$cnx = null;
    }


    
}    