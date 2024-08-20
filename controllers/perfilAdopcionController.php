<?php
require_once '../models/perfilAdopcionModel.php';

// Obtener el id desde la query string
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    perfilAdopcionModel::getConexion();

    $model = new perfilAdopcionModel();
    $model->obtenerAnimal($id);

    // Devolver datos en formato JSON
    $response = array(
        'nombre' => $model->getNombre(),
        'especie' => $model->getEspecie(),
        'colorPelaje' => $model->getColorPelaje(),
        'edad' => $model->getEdad(),
        'tamano' => $model->getTamano(),
        'raza' => $model->getRaza(),
        'ubicacion' => $model->getUbicacion(),
        'castracion' => $model->getCastracion(),
        'imagenes' => $model->getImagenes()
    );

    echo json_encode($response);

    perfilAdopcionModel::desconectar();
} else {
    echo json_encode(array('error' => 'ID no válido'));
}
?>
