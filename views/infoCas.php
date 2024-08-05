<?php
// Incluir el modelo de campañas
require_once '../models/registroCasModel.php';

// Obtener campañas desde la base de datos
$lugares = registroCasModel::obtenerCampanas();

// Aplicar filtro si se ha buscado algo
$filtrolugares = $lugares;

if (!empty($_GET['search'])) {
    $search = strtolower($_GET['search']); // Convierte la búsqueda a minúsculas
    $filtrolugares = array_filter($lugares, function ($lugar) use ($search) {
        return strpos(strtolower($lugar['ubiCamp']), $search) !== false; // Arreglo que contiene solo los lugares que coinciden con el término de búsqueda (strpos busca la primera coincidencia dentro de lo buscado)
    });
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Castraciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/infoCas.css">
</head>

<body>

    <?php include 'menu.php'; ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-3">Filtro de zona</h2>
                <form>
                    <input type="search" class="form-control mb-4" name="search" placeholder="Buscar por zona"
                        value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
            <div class="agregarCas">
                <form>
                    <a href="registroCas.php" class="btn btn-primary">Registrar Nueva Campaña</a>
                </form>
            </div>
        </div>
        <div class="row">
            <?php foreach ($filtrolugares as $lugar): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= htmlspecialchars($lugar['imagenCamp']) ?>" class="card-img-top" alt="Campaña">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($lugar['nombreCamp']) ?></h5>
                            <p class="card-text"><i class="ubicacion"></i> <?= htmlspecialchars($lugar['ubiCamp']) ?></p>
                            <p class="card-text">Fecha de inicio: <?= htmlspecialchars($lugar['fechaInicioCamp']) ?></p> 
                            <p class="card-text">Fecha de fin: <?= htmlspecialchars($lugar['fechaFinCamp']) ?></p>     
                            <a href="<?= htmlspecialchars($lugar['infoLinkCamp']) ?>" class="btn btn-primary">Más Información</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>