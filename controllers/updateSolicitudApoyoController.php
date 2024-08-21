<?php
session_start();
if ($_SESSION['user']['rol'] !== 'admin') {
    header('Location: index.php'); // Redirige si el usuario no es admin
    exit;
}

require_once '../models/SolicitudApoyoModel.php';

$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSolicitud = $_POST['id'];
    $nuevoEstado = $_POST['estado'];

    $solicitudApoyo = new SolicitudApoyoModel();
    $resultado = $solicitudApoyo->actualizarEstadoSolicitud($idSolicitud, $nuevoEstado);

    if ($resultado) {
        $response['success'] = true;
        $response['message'] = 'Solicitud actualizada';
    } else {
        $response['message'] = 'No se pudo actualizar la solicitud';
    }
} else {
    $response['message'] = 'Acceso no válido';
}

header('Content-Type: application/json');
echo json_encode($response);
?>

