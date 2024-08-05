<?php
require_once '../models/encontradoModel.php';

$idAnimal = (isset($_POST["idAnimal"])) ? $_POST["idAnimal"] : null;
$ubiEncontrado = (isset($_POST["ubiEncontrado"])) ? $_POST["ubiEncontrado"] : "";
$fechaEncontrado = (isset($_POST["fechaEncontrado"])) ? $_POST["fechaEncontrado"] : "";
$boolEncontrado = (isset($_POST["boolEncontrado"])) ? 1 : 0; // Convertir a booleano

$encontrado = new EncontradoModel();
$encontrado->setIdAnimal($idAnimal);
$encontrado->setUbiEncontrado($ubiEncontrado);
$encontrado->setFechaEncontrado($fechaEncontrado);
$encontrado->setBoolEncontrado($boolEncontrado);

try {
    $encontrado->guardar();
    $resp = array("exito" => true, "msg" => "Registro de encontrado realizado con éxito en la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}
?>
