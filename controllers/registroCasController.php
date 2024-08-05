<?php
require_once '../models/registroCasModel.php';

$nombreCamp = (isset($_POST["nombreCamp"])) ? $_POST["nombreCamp"] : "";
$ubiCamp = (isset($_POST["ubiCamp"])) ? $_POST["ubiCamp"] : "";
$imagenCamp = (isset($_POST["imagenCamp"])) ? $_POST["imagenCamp"] : "";
$infoLinkCamp = (isset($_POST["infoLinkCamp"])) ? $_POST["infoLinkCamp"] : "";
$fechaInicioCamp = (isset($_POST["fechaInicioCamp"])) ? $_POST["fechaInicioCamp"] : ""; 
$fechaFinCamp = (isset($_POST["fechaFinCamp"])) ? $_POST["fechaFinCamp"] : "";         

$registro = new registroCasModel();
$registro->setNombreCamp($nombreCamp);
$registro->setUbiCamp($ubiCamp);
$registro->setImagenCamp($imagenCamp);
$registro->setInfoLinkCamp($infoLinkCamp);
$registro->setFechaInicioCamp($fechaInicioCamp); 
$registro->setFechaFinCamp($fechaFinCamp);       

try {
    $registro->guardar();
    $resp = array("exito" => true, "msg" => "Registro realizado con éxito a la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}
?>
