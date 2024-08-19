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
        'img' => 'https://www.neurovetcr.com/images/logo/logo%20Neurovet-01.png',
        'infoLink' => '#'
    ],
    [
        'nombre' => 'Campaña 3',
        'ubi' => 'Cartago',
        'img' => 'https://doctoresrobert.files.wordpress.com/2021/01/cropped-drrobert-01.png',
        'infoLink' => '#'
    ],
    [
        'nombre' => 'Campaña 4',
        'ubi' => 'Cartago',
        'img' => 'https://doctoresrobert.files.wordpress.com/2021/01/cropped-drrobert-01.png',
        'infoLink' => '#'
    ],
];


$filtrolugares = $lugares;

//se revisa si hay informacion en el input a base de un GET
if (!empty($_GET['search'])) {
    $search = strtolower($_GET['search']); //strtolower convierte el string en minusculas aara que no haya problemas en la busqueda con mayusculas
    $filtrolugares = array_filter($lugares, function ($lugar) use ($search) { //array_filter crea un nuevo arreglo en base a los elementos del arreglo lugares que cumplen con la condicion del callback, use incorpora a seacrh desde el html
        return strpos(strtolower($lugar['ubi']), $search) !== false; // strpos busca la primera ocurrencia de $search comparando con ubi el cual es el parametro que se usa para filtarr la busqueda, !== false hace que el filtro devuelva un true si el filtro de busqueda esta en la cadena
    });
}


?>


<?php 
    session_start();
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
    </header>
    <div class="container my-4">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="mb-3">Filtro de zona</h2>
                <form>
                    <input type="search" class="form-control mb-4" name="search" placeholder="Buscar por zona" value="<?= ($_GET['search']) ?? ''?>">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>
        <div class="row">
            <?php foreach ($filtrolugares as $lugar): ?>
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
    <footer>
    <?php
        include 'footer.php';
    ?>
</footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>