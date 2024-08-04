<?php

require_once '../config/Conexion.php';

class registroCasModel extends Conexion
{

    protected static $cnx;

    private $id = null;
    private $nombreCamp = null;
    private $ubiCamp = null;
    private $imagenCamp = null;
    private $infoLinkCamp = null;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombreCamp()
    {
        return $this->nombreCamp;
    }
    public function setNombreCamp($nombreCamp)
    {
        $this->nombreCamp = $nombreCamp;
    }

    public function getUbiCamp()
    {
        return $this->ubiCamp;
    }

    public function setUbiCamp($ubiCamp)
    {
        $this->ubiCamp = $ubiCamp;
    }

    public function getImagenCamp()
    {
        return $this->imagenCamp;
    }
    public function setImagenCamp($imagenCamp)
    {
        $this->imagenCamp = $imagenCamp;
    }

    public function getInfoLinkCamp()
    {
        return $this->infoLinkCamp;
    }
    public function setInfoLinkCamp($infoLinkCamp)
    {
        $this->infoLinkCamp = $infoLinkCamp;
    }

    public function __construct()
    {
    }

    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function guardar()
    {
        $query = "INSERT INTO `campcas`(`nombreCamp`, `ubiCamp`, `imagenCamp`, `infoLinkCamp`) VALUES (:nombreCampPDO,:ubiCampPDO,:imagenCampPDO,:infoLinkCampPDO)";
        try {
            self::getConexion();
            $nombreCampP = $this->getNombreCamp();
            $ubiCampP = $this->getUbiCamp();
            $imagenCampP = $this->getImagenCamp();
            $infoLinkCampP = $this->getInfoLinkCamp();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":nombreCampPDO", $nombreCampP, PDO::PARAM_STR);
            $resultado->bindParam(":ubiCampPDO", $ubiCampP, PDO::PARAM_STR);
            $resultado->bindParam(":imagenCampPDO", $imagenCampP, PDO::PARAM_STR);
            $resultado->bindParam(":infoLinkCampPDO", $infoLinkCampP, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error" . $ex->getCode() . ": " . $ex->getMessage();
            return json_encode($error);
        }
    }

    public static function obtenerCampanas() {
        $query = "SELECT nombreCamp, ubiCamp, imagenCamp, infoLinkCamp FROM campcas";
        $result = [];
    
        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->execute();
            
            // Fetch all results
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al obtener las campañas: " . $ex->getMessage();
        }
    
        return $result;
    }
}
?>