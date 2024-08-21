<?php 
    require_once '../config/Conexion.php';
    class SolicitudApoyoModel extends Conexion{
        protected static $cnx;
        private $idApoyo; 
        private $idUsuario; 
        private $detalleRescate; 
        private $detalleAnimal; 
        private $ubicacion; 
        private $nombre; 
        private $apellido; 
        private $correo; 
        private $telefono; 
        private $estado; 

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
        public function getubicacion(){
            return $this->ubicacion;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellido;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getEstado(){
            return $this->estado;
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
        public function setUbicacion($ubicacion){
            $this->ubicacion = $ubicacion;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApellidos($apellido){
            $this->apellido = $apellido;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }

        public static function getConexion(){
            self::$cnx = conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }
    
        public function solicitudApoyo(){
            $query = "INSERT INTO `sc502solicitudesapoyo`(`nombre`, `apellido`, `detalles_rescate`, `detalles_animal`, `correo`, `telefono`, `ubicacion`, `estado`) VALUES (:nombrePDO,:apellidoPDO,:detalleRescatePDO,:detalleAnimalPDO,:correoPDO,:telefonoPDO,:ubicacionPDO,:estadoPDO)";
            try{
                self::getConexion();
                $nombre = $this ->getNombre(); 
                $apellido = $this ->getApellidos();
                $detalleRescate = $this -> getDetalleRescate(); 
                $detalleAnimal = $this -> getDetalleAnimal(); 
                $correo =  $this -> getCorreo(); 
                $telefono =  $this -> getTelefono(); 
                $ubicacion = $this -> getubicacion();  
                $estado =  $this -> getEstado(); 
                $solicitud = self::$cnx->prepare($query);
                $solicitud->bindParam(":nombrePDO", $nombre, PDO::PARAM_STR);
                $solicitud->bindParam(":apellidoPDO", $apellido, PDO::PARAM_STR);
                $solicitud->bindParam(":detalleRescatePDO", $detalleRescate, PDO::PARAM_STR);
                $solicitud->bindParam(":detalleAnimalPDO", $detalleAnimal, PDO::PARAM_STR);
                $solicitud->bindParam(":correoPDO", $correo, PDO::PARAM_STR);
                $solicitud->bindParam(":telefonoPDO", $telefono, PDO::PARAM_STR);
                $solicitud->bindParam(":ubicacionPDO", $ubicacion, PDO::PARAM_STR);
                $solicitud->bindParam(":estadoPDO", $estado, PDO::PARAM_INT);
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