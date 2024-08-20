<?php
require_once '../models/solicitudAdopcionModel.php';

$idAnimal = (isset($_POST["idAnimal"])) ? $_POST["idAnimal"] : "";
$nombreSoliAdopcion = (isset($_POST["nombreSoliAdopcion"])) ? $_POST["nombreSoliAdopcion"] : "";
$correoSoliAdopcion = (isset($_POST["correoSoliAdopcion"])) ? $_POST["correoSoliAdopcion"] : "";
$telefonoSoliAdopcion = (isset($_POST["telefonoSoliAdopcion"])) ? $_POST["telefonoSoliAdopcion"] : "";
$direccionSoliAdopcion = (isset($_POST["direccionSoliAdopcion"])) ? $_POST["direccionSoliAdopcion"] : "";
$booleanSoliAdopcion = (isset($_POST["booleanSoliAdopcion"])) ? 1 : 0;

$solicitud = new solicitudAdopcionModel();
$solicitud-> setIdAnimal($idAnimal);
$solicitud-> setNombre($nombreSoliAdopcion); 
$solicitud-> setCorreo($correoSoliAdopcion); 
$solicitud-> setTelefono($telefonoSoliAdopcion); 
$solicitud-> setDireccion($direccionSoliAdopcion); 
$solicitud-> setBoolSoli($booleanSoliAdopcion);

try {
    $solicitud->guardarSoliAdopcion(); 
    $resp = array("exito" => true, "msg" => "Registro realizado con éxito a la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}

?>