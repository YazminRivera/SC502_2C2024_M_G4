<?php
require_once '../config/Conexion.php';

class SolicitudApoyoModel extends Conexion
{
    protected static $cnx;
    private $idSolicitud;
    private $nombre;
    private $apellidos;
    private $correo;
    private $telefono;
    private $detalleRescate;
    private $detalleAnimal;
    private $estado;
    private $userLatitude;
    private $userLongitude;

    // Métodos getter y setter
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
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
    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getDetalleRescate()
    {
        return $this->detalleRescate;
    }
    public function getDetalleAnimal()
    {
        return $this->detalleAnimal;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getUserLatitude()
    {
        return $this->userLatitude;
    }
    public function getUserLongitude()
    {
        return $this->userLongitude;
    }
    
    public function setIdSolicitud($idSolicitud)
    {
        $this->idSolicitud = $idSolicitud;
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
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setDetalleRescate($detalleRescate)
    {
        $this->detalleRescate = $detalleRescate;
    }
    public function setDetalleAnimal($detalleAnimal)
    {
        $this->detalleAnimal = $detalleAnimal;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function setUserLatitude($userLatitude)
    {
        $this->userLatitude = $userLatitude;
    }
    public function setUserLongitude($userLongitude)
    {
        $this->userLongitude = $userLongitude;
    }

    // constructor
    public function __construct()
    {
        parent::__construct();
    }

    // Métodos de conexión
    private static function getConexion()
    {
        if (!self::$cnx) {
            self::$cnx = Conexion::conectar();
        }
        return self::$cnx;
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    public function solicitudApoyo()
    {
        $this->estado = 1; // 1 representa "pendiente"

        // (idSolicitud, nombre, apellido, detalles_rescate, detalles_animal, correo, telefono, ubicacion)
        $query = "INSERT INTO `sc502solicitudesapoyo`(`nombre`, `apellido`, `detalles_rescate`, `detalles_animal`, `correo`, `telefono`, `estado` ,`ubicacion`) VALUES (:nombrePDO, :apellidoPDO, :detallesRescatePDO, :detallesAnimalPDO, :correoPDO, :telefonoPDO, :estadoPDO, :ubicacionPDO)";
        try {
            self::getConexion();
            $ubicacion = $this->userLatitude . ", " . $this->userLongitude;
            $solicitud = self::$cnx->prepare($query);
            $solicitud->bindParam(":nombrePDO", $this->nombre);
            $solicitud->bindParam(":apellidoPDO", $this->apellidos);
            $solicitud->bindParam(":detallesRescatePDO", $this->detalleRescate);
            $solicitud->bindParam(":detallesAnimalPDO", $this->detalleAnimal);
            $solicitud->bindParam(":correoPDO", $this->correo);
            $solicitud->bindParam(":telefonoPDO", $this->telefono);
            $solicitud->bindParam(":estadoPDO", $this->estado);
            $solicitud->bindParam(":ubicacionPDO", $ubicacion);

            $solicitud->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function listarSolicitudes() 
    {
        $query = "SELECT * FROM `sc502solicitudesapoyo`";
        try {
            self::getConexion();
            $solicitudes = self::$cnx->prepare($query);
            $solicitudes->execute();
            return $solicitudes->fetchAll(PDO::FETCH_ASSOC); 
        } catch (PDOException $Exception) {
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        } finally {
            self::desconectar();
        }
    }

    public function obtenerSolicitudById($id)
    {
        $query = "SELECT * FROM `sc502solicitudesapoyo` WHERE `idSolicitud` = :id";
        try {
            self::getConexion();
            $solicitud = self::$cnx->prepare($query);
            $solicitud->bindParam(":id", $id);
            $solicitud->execute();
            return $solicitud->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        } finally {
            self::desconectar();
        }
    }

    public function actualizarEstadoSolicitud($id, $nuevoEstado)
{
    $query = "UPDATE `sc502solicitudesapoyo` SET `estado` = :estadoPDO WHERE `idSolicitud` = :idPDO";
    try {
        self::getConexion();
        $stmt = self::$cnx->prepare($query);
        $stmt->bindParam(":estadoPDO", $nuevoEstado);
        $stmt->bindParam(":idPDO", $id);

        $resultado = $stmt->execute();
        self::desconectar();
        return $resultado;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        return false;
    }
}

}

