<?php
header('Content-Type: application/json');
require_once '../models/SolicitudApoyoModel.php';

// Función para obtener el estado en formato legible
function obtenerEstadoDescripcion($estado) {
    switch ($estado) {
        case 1:
            return 'Pendiente';
        case 2:
            return 'En Proceso';
        case 3:
            return 'Completado';
        default:
            return 'Desconocido';
    }
}

try {
    $solicitudApoyo = new SolicitudApoyoModel();
    $solicitudes = $solicitudApoyo->listarSolicitudes();

    // Convertir el estado numérico a su descripción legible
    foreach ($solicitudes as &$solicitud) {
        $solicitud['estado'] = obtenerEstadoDescripcion($solicitud['estado']);
    }

    echo json_encode($solicitudes);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Error en el servidor: ' . $e->getMessage()]);
}
?>
