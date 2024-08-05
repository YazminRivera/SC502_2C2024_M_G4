<?php
require_once '../models/desaparicionModel.php';
require_once '../models/encontradoModel.php';

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

    // Actualizar el estado en la tabla de encontrados
    $encontrado = new EncontradoModel();
    $encontrado->setIdAnimal($idAnimal);
    $encontrado->setBoolEncontrado(0); //Se cambia el boolean a 0 indicando que no esta encontrado
    $encontrado->actualizarEstado();

    $resp = array("exito" => true, "msg" => "Animal registrado como desaparecido.");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error: " . $th->getMessage());
    echo json_encode($resp);
}
?>