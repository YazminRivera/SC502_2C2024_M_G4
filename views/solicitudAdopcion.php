<?php 
    session_start();
    if (!isset($_SESSION['user'])) {
        // Si no está iniciada, redirige al usuario a la página de inicio de sesión
        header("Location: inicioSesion.php");
        exit();
    }
?>
<?php
$idAnimal = (isset($_GET['id'])) ? $_GET['id'] : "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de adopción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/solicitudAdopcion.css">
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
    <section class="container solicitudAdopcion" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Solicitud de Adopción</h3>
        <form action="" id="formSolicitudAdopcion" method="post">
            <input type="hidden" name="opc" value="guardar">
            <div class="col-12 d-flex">
                <div class="col-6">                    
                    <div class="mb-3">
                        <label for="nombreSoliAdopcion" class="form-label">Nombre</label>
                        <input type="text" class="form-control text" id="nombreSoliAdopcion" name="nombreSoliAdopcion"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['nombre'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="correoSoliAdopcion" class="form-label">Correo</label>
                        <input type="text" class="form-control text" id="correoSoliAdopcion" name="correoSoliAdopcion"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['correo'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telefonoSoliAdopcion" class="form-label">Teléfono</label>
                        <input type="text" class="form-control text" id="telefonoSoliAdopcion" name="telefonoSoliAdopcion"
                        value="<?php if (!isset($_SESSION['user'])) {
                            echo '';
                        } else {
                            echo $_SESSION['user']['telefono'];
                        }?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="direccionSoliAdopcion" class="form-label">Dirección</label>
                        <input type="text" class="form-control text" id="direccionSoliAdopcion" name="direccionSoliAdopcion
                        ">
                    </div>
                    <div class="col-12 mt-3 boton-end">
                        <button class="btn-Enviar" type="submit">Enviar</button>
                    </div>
                    </div>
                </div>
            </div>        
        </form>
        <div id="response"></div>
</section>  
</body>
<script src="./assets/js/solicitudAdopcionJS.js"></script>
</html>
