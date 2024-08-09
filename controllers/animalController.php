<?php
require_once '../models/animalModel.php';

$tipoAnimal = (isset($_POST["tipoAnimal"])) ? $_POST["tipoAnimal"] : "";
$nombreAnm = (isset($_POST["nombreAnm"])) ? $_POST["nombreAnm"] : "";
$edadAnm = (isset($_POST["edadAnm"])) ? $_POST["edadAnm"] : 0;
$razaAnm = (isset($_POST["razaAnm"])) ? $_POST["razaAnm"] : "";
$colorPelaje = (isset($_POST["colorPelaje"])) ? $_POST["colorPelaje"] : "";
$imagenAnm = (isset($_POST["imagenAnm"])) ? $_POST["imagenAnm"] : ""; 

$animal = new AnimalModel();
$animal->setTipoAnimal($tipoAnimal);
$animal->setNombreAnm($nombreAnm);
$animal->setEdadAnm($edadAnm);
$animal->setRazaAnm($razaAnm);
$animal->setColorPelaje($colorPelaje);
$animal->setImagenAnm($imagenAnm); 

try {
    $animal->guardar();
    $resp = array("exito" => true, "msg" => "Registro realizado con éxito a la BD");
    echo json_encode($resp);
} catch (PDOException $th) {
    $resp = array("exito" => false, "msg" => "Se presentó un error");
    echo json_encode($resp);
}
?>
