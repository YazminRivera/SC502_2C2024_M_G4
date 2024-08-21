<?php
session_start();
if ($_SESSION['user']['rol'] !== 'admin') {
    header('Location: index.php'); // Redirige si el usuario no es admin
    exit;
}

require_once '../controllers/listarSolicitudesController.php';

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'menuAdmin.php'; ?>
    <div class="container mt-4">
        <h2>Solicitudes de Apoyo</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Del Solicitante</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($solicitudes as $solicitud) { ?>
                    <tr>
                        <td><?php echo $solicitud['idSolicitud']; ?></td>
                        <td><?php echo $solicitud['nombre']; ?></td>
                        <td><?php echo obtenerEstadoDescripcion($solicitud['estado']); ?></td>
                        <td>
                            <a href="revisionSolicitudApoyo.php?id=<?php echo $solicitud['idSolicitud']; ?>" class="btn btn-primary">Revisar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
