<?php
require_once '../models/encontradoModel.php';

//Obtener animales encontrados desde la base de datos
$encontrados = EncontradoModel::obtenerEncontrados();
?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Animales Encontrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/encontrados.css">
</head>

<body>

<?php
    if (!isset($_SESSION['user'])) {
        // No está autenticado, muestra el menú de invitado
        include 'menu.php';
    } else {
        // Está autenticado, muestra el menú basado en el rol
        if ($_SESSION['user']['rol'] === 'admin') {
            include 'menuAdmin.php';
        } else {
            include 'menuUser.php';
        }
    }
    ?>

    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-3">Lista de Animales Encontrados</h2>
                <a href="registroEncontrado.php" class="btn btn-primary mb-4">Registrar Nuevo Encontrado</a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($encontrados as $encontrado): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $encontrado['imagenAnm'] ?>" class="card-img-top" alt="Animal">
                        <div class="card-body">
                            <h5 class="card-title"><?= $encontrado['nombreAnm'] ?></h5>
                            <p class="card-text"><strong>ID del Animal:</strong> <?= $encontrado['idAnimal'] ?></p>
                            <p class="card-text"><strong>Tipo:</strong> <?= $encontrado['tipoAnimal'] ?></p>
                            <p class="card-text"><strong>Edad:</strong> <?= $encontrado['edadAnm'] ?> años</p>
                            <p class="card-text"><strong>Raza:</strong> <?= $encontrado['razaAnm'] ?></p>
                            <p class="card-text"><strong>Color de Pelaje:</strong> <?= $encontrado['colorPelaje'] ?></p>
                            <p class="card-text"><strong>Ubicación Encontrado:</strong> <?= $encontrado['ubiEncontrado'] ?></p>
                            <p class="card-text"><strong>Fecha Encontrado:</strong> <?= $encontrado['fechaEncontrado'] ?></p>
                            <p class="card-text"><strong>Encontrado:</strong> <?= $encontrado['boolEncontrado'] ? 'Sí' : 'No' ?></p>
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
