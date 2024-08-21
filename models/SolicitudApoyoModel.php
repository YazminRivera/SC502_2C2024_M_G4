<?php 
    require_once '../config/Conexion.php';
    class SolicitudApoyoModel extends Conexion{
        protected static $cnx;
        private $idApoyo; 
        private $idUsuario; 
        private $detalleRescate; 
        private $detalleAnimal; 
        private $userLatitude; 
        private $userLongitude; 

        public function getIdApoyo(){
            return $this->idApoyo;
        }
        public function getIdUsuario(){
            return $this->idUsuario;
        }
        public function getDetalleRescate(){
            return $this->detalleRescate;
        }
        public function getDetalleAnimal(){
            return $this->detalleAnimal;
        }
        public function getUserLatitude(){
            return $this->userLatitude;
        }
        public function getUserLongitude(){
            return $this->userLongitude;
        }
        public function setIdApoyo($idApoyo) {
            $this->idApoyo = $idApoyo;
        }
        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }
        public function setDetalleRescate($detalleRescate) {
            $this->detalleRescate = $detalleRescate;
        }
        public function setDetalleAnimal($detalleAnimal) {
            $this->detalleAnimal = $detalleAnimal;
        }
        public function setUserLatitude($userLatitude){
            $this->userLatitude = $userLatitude;
        }
        public function setUserLongitude($userLongitude){
            $this->userLongitude = $userLongitude;
        }

        public static function getConexion(){
            self::$cnx = conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }
    
        public function solicitudApoyo(){
            $query = "INSERT INTO `sc502apoyo`(`idUsuario`, `detalleRescate`, `detalleAnimal`, `userLatitude`, `userLongitude`) VALUES (:idUsuarioPDO,:detalleRescatePDO,:detalleAnimalPDO,:userLatitudePDO,:userLongitudePDO)";
            try{
                self::getConexion();
                $idUsuario = $this ->getIdUsuario(); 
                $detalleRescate = $this -> getDetalleRescate(); 
                $detalleAnimal = $this -> getDetalleAnimal(); 
                $userLatitude = $this -> getUserLatitude(); 
                $userLongitude = $this -> getUserLongitude(); 
                $solicitud = self::$cnx->prepare($query);
                $solicitud->bindParam(":idUsuarioPDO", $idUsuario, PDO::PARAM_INT);
                $solicitud->bindParam(":detalleRescatePDO", $detalleRescate, PDO::PARAM_STR);
                $solicitud->bindParam(":detalleAnimalPDO", $detalleAnimal, PDO::PARAM_STR);
                $solicitud->bindParam(":userLatitudePDO", $userLatitude, PDO::PARAM_STR);
                $solicitud->bindParam(":userLongitudePDO", $userLongitude, PDO::PARAM_STR);
                $solicitud->execute();
                self::desconectar();
            }catch (PDOException $Exception){
                self::desconectar();
                $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
                return $error;
            }   
        }

    }
?>