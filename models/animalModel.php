<?php

require_once '../config/Conexion.php';

class AnimalModel extends Conexion
{
    protected static $cnx;

    private $idAnimal;
    private $tipoAnimal;
    private $nombreAnm;
    private $edadAnm;
    private $razaAnm;
    private $colorPelaje;
    private $imagenAnm;  

    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    public function getTipoAnimal()
    {
        return $this->tipoAnimal;
    }

    public function setTipoAnimal($tipoAnimal)
    {
        $this->tipoAnimal = $tipoAnimal;
    }

    public function getNombreAnm()
    {
        return $this->nombreAnm;
    }

    public function setNombreAnm($nombreAnm)
    {
        $this->nombreAnm = $nombreAnm;
    }

    public function getEdadAnm()
    {
        return $this->edadAnm;
    }

    public function setEdadAnm($edadAnm)
    {
        $this->edadAnm = $edadAnm;
    }

    public function getRazaAnm()
    {
        return $this->razaAnm;
    }

    public function setRazaAnm($razaAnm)
    {
        $this->razaAnm = $razaAnm;
    }

    public function getColorPelaje()
    {
        return $this->colorPelaje;
    }

    public function setColorPelaje($colorPelaje)
    {
        $this->colorPelaje = $colorPelaje;
    }

    public function getImagenAnm()
    {
        return $this->imagenAnm;
    }

    public function setImagenAnm($imagenAnm)
    {
        $this->imagenAnm = $imagenAnm;
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
        $query = "INSERT INTO `sc502animal`(`tipoAnimal`, `nombreAnm`, `edadAnm`, `razaAnm`, `colorPelaje`, `imagenAnm`) 
                  VALUES (:tipoAnimalPDO, :nombreAnmPDO, :edadAnmPDO, :razaAnmPDO, :colorPelajePDO, :imagenAnmPDO)";
        try {
            self::getConexion();
            $tipoAnimalP = $this->getTipoAnimal();
            $nombreAnmP = $this->getNombreAnm();
            $edadAnmP = $this->getEdadAnm();
            $razaAnmP = $this->getRazaAnm();
            $colorPelajeP = $this->getColorPelaje();
            $imagenAnmP = $this->getImagenAnm(); 

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":tipoAnimalPDO", $tipoAnimalP, PDO::PARAM_STR);
            $resultado->bindParam(":nombreAnmPDO", $nombreAnmP, PDO::PARAM_STR);
            $resultado->bindParam(":edadAnmPDO", $edadAnmP, PDO::PARAM_INT);
            $resultado->bindParam(":razaAnmPDO", $razaAnmP, PDO::PARAM_STR);
            $resultado->bindParam(":colorPelajePDO", $colorPelajeP, PDO::PARAM_STR);
            $resultado->bindParam(":imagenAnmPDO", $imagenAnmP, PDO::PARAM_STR); 

            $resultado->execute();
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            $error = "Error" . $ex->getCode() . ": " . $ex->getMessage();
            return json_encode($error);
        }
    }

    public static function obtenerAnimales()
    {
        $query = "SELECT idAnimal, tipoAnimal, nombreAnm, edadAnm, razaAnm, colorPelaje, imagenAnm FROM sc502animal";
        $result = [];

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->execute();

            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            self::desconectar();
        } catch (PDOException $ex) {
            self::desconectar();
            echo "Error al obtener los animales: " . $ex->getMessage();
        }

        return $result;
    }
}
?>