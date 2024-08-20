<?php
require_once '../config/conexion.php';

class InicioSesionModel extends Conexion{
    protected static $cnx;
    private $correo = null;
    private $contrasena = null;

    public function getCorreo() {
        return $this->correo;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    public static function getConexion()
    {
        self::$cnx = conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }
    
    public function Existencia() {
        $con = "SELECT COUNT(*) FROM `sc502usuario` WHERE correo = :correoPDO";
        $stmt = conexion::conectar()->prepare($con);
        $stmt->bindParam(":correoPDO", $this->correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }

    public function obtenerContrasena() {
        $con = "SELECT contrasena FROM `sc502usuario` WHERE correo = :correo";
        $stmt = conexion::conectar()->prepare($con);
        $stmt->bindParam(':correo', $this->correo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn(); 
    }

    public function iniciarSesion() {
        $contrasenaAlmacenada = $this->obtenerContrasena();
        $contrasenaIngresada = $this->getContrasena(); 
        
        if ($contrasenaAlmacenada !== false && $contrasenaAlmacenada === $contrasenaIngresada) {
            self::getConexion();
            $query = "SELECT idUsuario, nombre, apellidos, correo, telefono, rol, estado FROM `sc502usuario` WHERE correo = :correo";
            $stmt = conexion::conectar()->prepare($query);
            $stmt->bindParam(':correo', $this->correo, PDO::PARAM_STR);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_OBJ);
            self::desconectar(); 
            return $usuario;
        }
        return false; 
    }
}
?>