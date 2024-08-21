<?php
session_start();
if ($_SESSION['user']['rol'] !== 'admin') {
  header('Location: index.php'); // Redirige si el usuario no es admin
  exit;
}

$id = $_GET['id'];
require_once '../controllers/obtenerSolicitudByIdController.php';
$solicitud = $solicitudApoyo->obtenerSolicitudById($id);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Solicitud</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php include 'menuAdmin.php'; ?>
  <div class="container mt-4">
    <h2>Editar Solicitud</h2>
    <form id="editForm" action="procesarSolicitud.php" method="post">
      <input type="hidden" name="id" value="<?php echo $solicitud['idSolicitud']; ?>">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $solicitud['nombre']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="detalleRescate" class="form-label">Detalle del Rescate</label>
        <textarea class="form-control" id="detalleRescate" name="detalleRescate" rows="3" readonly><?php echo $solicitud['detalles_rescate']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $solicitud['correo']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="telefono" class="form-label">Telefono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $solicitud['telefono']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $solicitud['apellido']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="detalleAnimal" class="form-label">Detalle del Animal</label>
        <textarea class="form-control" id="detalleAnimal" name="detalleAnimal" rows="3" readonly><?php echo $solicitud['detalles_animal']; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="ubicacion" class="form-label">Ubicación</label>
        <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $solicitud['ubicacion']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select class="form-select" id="estado" name="estado">
          <option value="1" <?php if ($solicitud['estado'] === '1') echo 'selected'; ?>>Pendiente</option>
          <option value="2" <?php if ($solicitud['estado'] === '2') echo 'selected'; ?>>En Proceso</option>
          <option value="3" <?php if ($solicitud['estado'] === '3') echo 'selected'; ?>>Completado</option>
        </select>
      </div>
      <button type="button"  class="btn btn-primary mb-4" id="guardarCambios" href="#">Guradar Cambios</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/updateSolicitudApoyo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>