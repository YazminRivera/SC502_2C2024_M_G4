<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Apoyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/vistaSolicitudes.css">
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
                <h2 class="mb-3">Solicitudes de Apoyo</h2>
            </div>
        </div>
        <div id="solicitudes-container" class="card-container w-75 mb-3">
            <!-- Las solicitudes se cargarán dinámicamente aquí -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBALApSS5sNNjhDPjzluVpF9U2ndzCZ2TA" async defer></script>
    <script src="./assets/js/vistaSolicitudesApoyo.js"></script>
</body>
</html>