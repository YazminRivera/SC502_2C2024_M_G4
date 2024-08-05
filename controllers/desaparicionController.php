<?php
require_once '../models/desaparicionModel.php';

$idAnimal = (isset($_POST["idAnimal"])) ? $_POST["idAnimal"] : null;
$ubiDesaparicion = (isset($_POST["ubiDesaparicion"])) ? $_POST["ubiDesaparicion"] : "";
$fechaDesaparicion = (isset($_POST["fechaDesaparicion"])) ? $_POST["fechaDesaparicion"] : "";
$boolDesaparecido = (isset($_POST["boolDesaparecido"])) ? 1 : 0; // Convertir a booleano

$desaparicion = new DesaparicionModel();
$desaparicion->setIdAnimal($idAnimal);
$desaparicion->setUbiDesaparicion($ubiDesaparicion);
$desaparicion->setFechaDesaparicion($fechaDesaparicion);
$desaparicion->setBoolDesaparecido($boolDesaparecido);

try {
    $desaparicion->guardar();
    $resp = array("exito" => true, "msg" => "Registro de desaparición realizado con éxito en la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}
?>
