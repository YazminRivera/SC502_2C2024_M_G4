<?php
require_once '../config/conexion.php';
class RegistroModel extends conexion
{
    protected static $cnx;
    private $idUsuario = null;
    private $nombre = null;
    private $apellidos = null;
    private $correo = null;
    private $contrasena = null;
    private $telefono = null;
    private $rol = null;
    private $estado = null;

    public function getId()
    {
        return $this->idUsuario;
    }


    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setId($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function __construct() {} //constructor

    public static function getConexion()
    {
        self::$cnx = conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function Existencia(){
        $con = "SELECT * FROM `sc502usuario` where correo=:correoPDO LIMIT 1";
        try {
            self::getConexion();
            $buscarUsurio = self::$cnx->prepare($con);
            $correo = $this->getCorreo();
            $buscarUsurio->bindParam(":correoPDO", $correo, PDO::PARAM_STR);
            $buscarUsurio->execute();
            self::desconectar();
                $encontrado = false;
                foreach ($buscarUsurio->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
        }catch (PDOException $Exception){
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    public function registrar()
    {
        $query = "INSERT INTO `sc502usuario`(`nombre`, `apellidos`, `correo`, `telefono`, `contrasena`, `rol`, `estado`) VALUES(:nombrePDO,:apellidosPDO,:correoPDO,:telefonoPDO,:contrasenaPDO,:rolPDO,:estadoPDO)";
        try {
            self::getConexion();
            $nombre = $this->getNombre();
            $apellidos = $this->getApellidos();
            $correo = $this->getCorreo();
            $telefono = $this->getTelefono();
            $contrasena = $this->getContrasena();
            $rol = $this->getRol();
            $estado = $this->getEstado();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombrePDO", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":apellidosPDO", $apellidos, PDO::PARAM_STR);
            $resultado->bindParam(":correoPDO", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":telefonoPDO", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":contrasenaPDO", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":rolPDO", $rol, PDO::PARAM_STR);
            $resultado->bindParam(":estadoPDO", $estado, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            } catch (PDOException $ex) {
                self::desconectar();
                $error = "Error" . $ex->getCode() . ": " . $ex->getMessage();
                return json_encode($error);
            }
            
    }
}
