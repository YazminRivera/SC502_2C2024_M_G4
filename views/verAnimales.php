<?php
require_once '../models/animalModel.php';

// Obtener animales desde la base de datos
$animales = AnimalModel::obtenerAnimales();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animales Registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/verAnimales.css">
</head>

<body>

    <?php include 'menu.php'; 
    ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-3">Lista de Animales Registrados</h2>
                <a href="registroAnimal.php" class="btn btn-primary mb-4">Registrar Nuevo Animal</a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($animales as $animal): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $animal['imagenAnm'] ?>" class="card-img-top" alt="Animal">
                        <div class="card-body">
                            <h5 class="card-title"><?= $animal['nombreAnm'] ?></h5>
                            <p class="card-text"><strong>ID del Animal:</strong> <?= $animal['idAnimal'] ?></p> 
                            <p class="card-text"><strong>Tipo:</strong> <?= $animal['tipoAnimal'] ?></p>
                            <p class="card-text"><strong>Edad:</strong> <?= $animal['edadAnm'] ?> años</p>
                            <p class="card-text"><strong>Raza:</strong> <?= $animal['razaAnm'] ?></p>
                            <p class="card-text"><strong>Color de Pelaje:</strong> <?= $animal['colorPelaje'] ?></p>
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