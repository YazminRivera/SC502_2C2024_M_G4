<?php
require_once '../models/registroCasModel.php';
$nombreCamp = (isset($_POST["nombreCamp"])) ? $_POST["nombreCamp"] : "";
$ubiCamp = (isset($_POST["ubiCamp"])) ? $_POST["ubiCamp"] : "";
$imagenCamp = (isset($_POST["imagenCamp"])) ? $_POST["imagenCamp"] : "";
$infoLinkCamp = (isset($_POST["infoLinkCamp"])) ? $_POST["infoLinkCamp"] : "";
$registro = new registroCasModel();
$registro->setNombreCamp($nombreCamp);
$registro->setUbiCamp($ubiCamp);
$registro->setImagenCamp($imagenCamp);
$registro->setInfoLinkCamp($infoLinkCamp);
try {
    $registro->guardar();
    $resp = array("exito" => true, "msg" => "Registro realizado con exito a la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presento un error");
    echo json_encode($resp);
}
?>