<!--se hace el bloque php desde arriba para que el arreglo exista al bajar al html-->
<?php
//arreglo de lugares para agregar informacion de los lugares de castracion
$lugares = [
    [
        'nombre' => 'Campaña 1',
        'ubi' => 'San Jose',
        'img' => 'https://www.neurovetcr.com/images/logo/logo%20Neurovet-01.png',
        'infoLink' => '#'
    ],
    [
        'nombre' => 'Campaña 2',
        'ubi' => 'Heredia',
        'img' => 'https://data506.com/wp-content/uploads/2015/08/veterinaria-la-vete.jpg',
        'infoLink' => '#'
    ],
    [
        'nombre' => 'Campaña 3',
        'ubi' => 'Cartago',
        'img' => 'https://doctoresrobert.files.wordpress.com/2021/01/cropped-drrobert-01.png',
        'infoLink' => '#'
    ],
    
    
];

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Castraciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/infoCas.css">
</head>
<body>
    <header>
    <?php
        include 'menu.php';
    ?>
    </header>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-3">Filtro de zona</h2>
                <input type="search" class="form-control mb-4" placeholder="Buscar por zona">
            </div>
        </div>
        <div class="row">
            <?php foreach ($lugares as $lugar): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?= $lugar['img'] ?>" class="card-img-top" alt="Campaña">
                        <div class="card-body">
                            <h5 class="card-title"><?= $lugar['nombre'] ?></h5>
                            <p class="card-text"><i class="ubicacion"></i> <?= $lugar['ubi'] ?></p>
                            <a href="<?= $lugar['infoLink'] ?>" class="btn btn-primary">Más Información</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

