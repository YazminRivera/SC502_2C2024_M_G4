<?php
require_once '../models/solicitudAdopcionModel.php';

$nombreSoliAdopcion = (isset($_POST["nombreSoliAdopcion"])) ? $_POST["nombreSoliAdopcion"] : "";
$correoSoliAdopcion = (isset($_POST["correoSoliAdopcion"])) ? $_POST["correoSoliAdopcion"] : "";
$telefonoSoliAdopcion = (isset($_POST["telefonoSoliAdopcion"])) ? $_POST["telefonoSoliAdopcion"] : "";
$direccionSoliAdopcion = (isset($_POST["direccionSoliAdopcion"])) ? $_POST["direccionSoliAdopcion"] : "";

$solicitud = new solicitudAdopcionModel();
$solicitud-> setNombre($nombreSoliAdopcion); 
$solicitud-> setCorreo($correoSoliAdopcion); 
$solicitud-> setTelefono($telefonoSoliAdopcion); 
$solicitud-> setDireccion($direccionSoliAdopcion); 

try {
    $solicitud->guardar(); //cambiar
    $resp = array("exito" => true, "msg" => "Registro realizado con éxito a la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}

?>