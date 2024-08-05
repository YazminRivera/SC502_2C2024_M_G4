<?php
require_once '../models/encontradoModel.php';
require_once '../models/desaparicionModel.php'; 

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

    //Actualizar el estado en la tabla de desaparecidos
    $desaparicion = new DesaparicionModel();
    $desaparicion->setIdAnimal($idAnimal);
    $desaparicion->setBoolDesaparecido(0); // Se cambia el boolean a 0 indicando que no esta desaparecido
    $desaparicion->actualizarEstado();

    $resp = array("exito" => true, "msg" => "Animal registrado como encontrado y actualizado en la base de datos");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error: " . $th->getMessage());
    echo json_encode($resp);
}
?>