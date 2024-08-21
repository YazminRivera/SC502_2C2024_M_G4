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
    <section class="container solicitudApoyo" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Solicitud de Apoyo</h3>
        <form action="" id="formSolicitudApoyo" method="post">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control text" id="nombre" name="nombre" 
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['nombre'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detalleRescate" class="form-label">Detalle del Rescate</label>
                        <textarea name="detalleRescate" class="form-control textArea" id="detalleRescate" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control text" id="correo" name="correo"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['correo'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control text" id="telefono" name="telefono"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['telefono'];
                        }?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control text" id="apellidos" name="apellidos"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['apellidos'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="detalleAnimal" class="form-label">Detalle del Animal</label>
                        <textarea name="detalleAnimal" class="form-control textArea" id="detalleAnimal" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="Ubicación" class="form-label">Ubicación</label>
                        <div id="map" class="mapa"></div>
                    </div>
                    <input type="hidden" id="idUsuario" name="idUsuario" 
                    value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['idUsuario'];
                        }?>">
                    <div class="col-12 mt-3 boton-end">
                        <button class="btn-Enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBALApSS5sNNjhDPjzluVpF9U2ndzCZ2TA" async defer onload="initMap()"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="./assets/js/solicitudApoyo.js"></script>
</body>

</html>