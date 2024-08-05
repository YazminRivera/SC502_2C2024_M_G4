<?php

require_once '../config/Conexion.php';

class DesaparicionModel extends Conexion
{
    protected static $cnx;

    private $idDesaparicion;
    private $idAnimal;
    private $ubiDesaparicion;
    private $fechaDesaparicion;
    private $boolDesaparecido;

    public function getIdDesaparicion()
    {
        return $this->idDesaparicion;
    }

    public function setIdDesaparicion($idDesaparicion)
    {
        $this->idDesaparicion = $idDesaparicion;
    }

    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    public function getUbiDesaparicion()
    {
        return $this->ubiDesaparicion;
    }

    public function setUbiDesaparicion($ubiDesaparicion)
    {
        $this->ubiDesaparicion = $ubiDesaparicion;
    }

    public function getFechaDesaparicion()
    {
        return $this->fechaDesaparicion;
    }

    public function setFechaDesaparicion($fechaDesaparicion)
    {
        $this->fechaDesaparicion = $fechaDesaparicion;
    }

    public function getBoolDesaparecido()
    {
        return $this->boolDesaparecido;
    }

    public function setBoolDesaparecido($boolDesaparecido)
    {
        $this->boolDesaparecido = $boolDesaparecido;
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
        $query = "INSERT INTO `sc502desapariciones`(`idAnimal`, `ubiDesaparicion`, `fechaDesaparicion`, `boolDesaparecido`) 
                  VALUES (:idAnimalPDO, :ubiDesaparicionPDO, :fechaDesaparicionPDO, :boolDesaparecidoPDO)";
        try {
            self::getConexion();
            $idAnimalP = $this->getIdAnimal();
            $ubiDesaparicionP = $this->getUbiDesaparicion();
            $fechaDesaparicionP = $this->getFechaDesaparicion();
            $boolDesaparecidoP = $this->getBoolDesaparecido();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idAnimalPDO", $idAnimalP, PDO::PARAM_INT);
            $resultado->bindParam(":ubiDesaparicionPDO", $ubiDesaparicionP, PDO::PARAM_STR);
            $resultado->bindParam(":fechaDesaparicionPDO", $fechaDesaparicionP, PDO::PARAM_STR);
            $resultado->bindParam(":boolDesaparecidoPDO", $boolDesaparecidoP, PDO::PARAM_BOOL);

            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error" . $ex->getCode() . ": " . $ex->getMessage();
            return json_encode($error);
        }
    }

    //se actuliza el boolean del estado
    public function actualizarEstado()
    {
        $query = "UPDATE `sc502desapariciones` SET `boolDesaparecido` = :boolDesaparecidoPDO WHERE `idAnimal` = :idAnimalPDO";
        try {
            self::getConexion();
            $idAnimalP = $this->getIdAnimal();
            $boolDesaparecidoP = $this->getBoolDesaparecido();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idAnimalPDO", $idAnimalP, PDO::PARAM_INT);
            $resultado->bindParam(":boolDesaparecidoPDO", $boolDesaparecidoP, PDO::PARAM_BOOL);

            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al actualizar el estado de desaparición: " . $ex->getMessage();
        }
    }


    //se hace join de la tabla animal y desaparicion para mostrar datos de las 2 t filtrar los encontrados
    public static function obtenerDesapariciones()
    {
        $query = "SELECT a.idAnimal, a.tipoAnimal, a.nombreAnm, a.edadAnm, a.razaAnm, a.colorPelaje, a.imagenAnm, 
                     d.idDesaparicion, d.ubiDesaparicion, d.fechaDesaparicion, d.boolDesaparecido
              FROM sc502animal a
              INNER JOIN sc502desapariciones d ON a.idAnimal = d.idAnimal
              WHERE d.boolDesaparecido = 1"; // Solo animales desaparecidos

        $result = [];

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al obtener las desapariciones: " . $ex->getMessage();
        }

        return $result;
    }
}
?>