<?php
require_once '../models/SolicitudApoyoModel.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$solicitudApoyo = new SolicitudApoyoModel();
$solicitud = $solicitudApoyo->obtenerSolicitudById($id);

if (!$solicitud) {
    header('Location: index.php');
    exit;
}
?>