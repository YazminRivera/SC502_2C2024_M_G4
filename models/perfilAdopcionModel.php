<?php

    require_once '../config/Conexion.php';

    class perfilAdopcionModel extends Conexion{

        protected static $cnx;

        private $id = null;
        private $nombre = null;
        private $imagenes = [];
        private $especie = null;
        private $edad = null;
        private $raza = null;
        private $colorPelaje = null;
        private $tamano = null;
        private $ubicacion = null;
        private $castrado = null;

        //Getters
        public function getId(){
            return $this-> id;
        }

        public function getNombre(){
            return $this-> nombre;
        }

        public function getImagenes(){
            return $this-> imagenes;
        }

        public function getEspecie(){
            return $this-> especie;
        }

        public function getRaza(){
            return $this-> raza;
        }

        public function getColorPelaje(){
            return $this-> colorPelaje;
        }

        public function getTamano(){
            return $this-> tamano;
        }

        public function getUbicacion(){
            return $this-> ubicacion;
        }

        public function getCastrado(){
            return $this-> castrado;
        }

        public function getEdad(){
            return $this -> edad;
        }

        //Setters
        public function setId($id){
            $this->id = $id;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function setImagenes($imagenes){
            $this->imagenes = $imagenes;
        }

        public function setEspecie($especie){
            $this->especie = $especie;
        }

        public function setRaza($raza){
            $this->raza = $raza;
        }

        public function setColorPelaje($colorPelaje){
            $this->colorPelaje = $colorPelaje;
        }

        public function setTamano($tamano){
            $this->tamano = $tamano;
        }

        public function setUbicacion($ubicacion){
            $this->ubicacion = $ubicacion;
        }

        public function setCastracion($castrado){
            $this->castrado = $castrado;
        }

        public function setEdad($edad){
            $this->edad = $edad;
        }

        //
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
        

        public function obtenerAnimal($id){
            $query = "SELECT nombreAnm, edadAnm, tipoAnimal, razaAnm, colorPelaje, tamano, ubicacion,
                             castrado, imagenAnm, img2, img3, img4
                      FROM sc502animal
                      WHERE idAnimal = :idAnimal";
        
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':idAnimal', $id);
            $stmt->execute();
        
            if($stmt->rowCount() > 0){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->setNombre($data['nombreAnm']);
                $this->setEspecie($data['tipoAnimal']);
                $this->setEdad($data['edadAnm']);
                $this->setRaza($data['razaAnm']);
                $this->setColorPelaje($data['colorPelaje']);
                $this->setTamano($data['tamano']);
                $this->setUbicacion($data['ubicacion']);
                $this->setCastracion($data['castrado'] == 1 ? "Sí" : "No");
                $imagenes = [
                    $data['imagenAnm'],
                    $data['img2'],
                    $data['img3'],
                    $data['img4']
                ];
                $this->setImagenes(array_filter($imagenes)); // Eliminar valores nulos o vacíos
            
            }
        }

        public static function obtenerAnimalPorId($idAnimal) {
            self::getConexion(); // Establecer la conexión
            $stmt = self::$cnx->prepare("SELECT * FROM sc502animal WHERE idAnimal = :idAnimal");
            $stmt->bindParam(':idAnimal', $idAnimal, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        
    }
    
?>