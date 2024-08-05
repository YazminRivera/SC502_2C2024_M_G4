<?php

require_once '../config/Conexion.php';

class EncontradoModel extends Conexion
{
    protected static $cnx;

    private $idEncontrado;
    private $idAnimal;
    private $ubiEncontrado;
    private $fechaEncontrado;
    private $boolEncontrado;

    public function getIdEncontrado()
    {
        return $this->idEncontrado;
    }

    public function setIdEncontrado($idEncontrado)
    {
        $this->idEncontrado = $idEncontrado;
    }

    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    public function getUbiEncontrado()
    {
        return $this->ubiEncontrado;
    }

    public function setUbiEncontrado($ubiEncontrado)
    {
        $this->ubiEncontrado = $ubiEncontrado;
    }

    public function getFechaEncontrado()
    {
        return $this->fechaEncontrado;
    }

    public function setFechaEncontrado($fechaEncontrado)
    {
        $this->fechaEncontrado = $fechaEncontrado;
    }

    public function getBoolEncontrado()
    {
        return $this->boolEncontrado;
    }

    public function setBoolEncontrado($boolEncontrado)
    {
        $this->boolEncontrado = $boolEncontrado;
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
        $query = "INSERT INTO `sc502Encontrados`(`idAnimal`, `ubiEncontrado`, `fechaEncontrado`, `boolEncontrado`) 
                  VALUES (:idAnimalPDO, :ubiEncontradoPDO, :fechaEncontradoPDO, :boolEncontradoPDO)";
        try {
            self::getConexion();
            $idAnimalP = $this->getIdAnimal();
            $ubiEncontradoP = $this->getUbiEncontrado();
            $fechaEncontradoP = $this->getFechaEncontrado();
            $boolEncontradoP = $this->getBoolEncontrado();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":idAnimalPDO", $idAnimalP, PDO::PARAM_INT);
            $resultado->bindParam(":ubiEncontradoPDO", $ubiEncontradoP, PDO::PARAM_STR);
            $resultado->bindParam(":fechaEncontradoPDO", $fechaEncontradoP, PDO::PARAM_STR);
            $resultado->bindParam(":boolEncontradoPDO", $boolEncontradoP, PDO::PARAM_BOOL);

            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error" . $ex->getCode() . ": " . $ex->getMessage();
            return json_encode($error);
        }
    }

    //se combinan la tabla de animal y encontardo para mostrar datos de las 2
    public static function obtenerEncontrados()
    {
        $query = "SELECT a.idAnimal, a.tipoAnimal, a.nombreAnm, a.edadAnm, a.razaAnm, a.colorPelaje, a.imagenAnm, 
                         e.idEncontrado, e.ubiEncontrado, e.fechaEncontrado, e.boolEncontrado
                  FROM sc502animal a
                  INNER JOIN sc502Encontrados e ON a.idAnimal = e.idAnimal";
        $result = [];

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al obtener los animales encontrados: " . $ex->getMessage();
        }

        return $result;
    }
}
?>
