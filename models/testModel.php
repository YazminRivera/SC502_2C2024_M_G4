<?php
require_once '../models/perfilAdopcionModel.php';

// Prueba con un id específico, asegúrate de que este id existe en la base de datos.
$id = 1; // Cambia esto por un id válido que exista en tu tabla sc502animal.

perfilAdopcionModel::getConexion();

$model = new perfilAdopcionModel();
$model->obtenerAnimal($id);

$response = array(
    'nombre' => $model->getNombre(),
    'especie' => $model->getEspecie(),
    'colorPelaje' => $model->getColorPelaje(),
    'edad' => $model->getEdad(),
    'tamano' => $model->getTamano(),
    'raza' => $model->getRaza(),
    'ubicacion' => $model->getUbicacion(),
    'castrado' => $model->getCastrado(),
    'imagenes' => $model->getImagenes()
);

echo json_encode($response);

perfilAdopcionModel::desconectar();
?>
