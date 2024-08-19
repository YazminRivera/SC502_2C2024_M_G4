<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de apoyo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/solicitudApoyo.css">

</head>

<body onLoad="localize()">
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
    <section class="container solicitudApoyo" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Solicitud de Apoyo</h3>
        <form action="" id="formSolicitudApoyo" method="post">
            <input type="hidden" name="opc" value="guardar">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control text" id="nombreUsuario" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="detalle" class="form-label">Detalle del Rescate</label>
                        <textarea name="detalle" class="form-control textArea" id="detalleRescate" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control text" id="correoUsuario" name="correo">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control text" id="telefonoUsuario" name="telefono">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control text" id="apellidoUsuario" name="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="detalleAnimel" class="form-label">Detalle del Animal</label>
                        <textarea name="detalleAnimel" class="form-control textArea" id="detalleAnimal" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Ubicación" class="form-label">Ubicación</label>
                        <div id="map" class="mapa"></div>
                    </div>
                    <div class="col-12 mt-3 boton-end">
                        <button class="btn-Enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBALApSS5sNNjhDPjzluVpF9U2ndzCZ2TA&callback=initMap&v=weekly&solution_channel=GMP_CCS_geolocation_v2"
      defer
    ></script>
    <script src="./assets/js/solicitudApoyo.js"></script>
</body>

</html>