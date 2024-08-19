<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Campañas de Castracion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/registroCas.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <section class="container registroCas" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Registro de Campañas de Castración</h3>
        <form id="formRegistroCas">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nombreCamp" class="form-label">Nombre de la Campaña</label>
                        <input type="text" class="form-control" id="nombreCamp" name="nombreCamp">
                    </div>
                    <div class="mb-3">
                        <label for="ubiCamp" class="form-label">Ubicación</label>
                        <input type="text" class="form-control" id="ubiCamp" name="ubiCamp">
                    </div>
                    <div class="mb-3">
                        <label for="fechaInicioCamp" class="form-label">Fecha de Inicio</label> 
                        <input type="date" class="form-control" id="fechaInicioCamp" name="fechaInicioCamp">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="imagenCamp" class="form-label">Imagen</label>
                        <input type="text" class="form-control text" id="imagenCamp" name="imagenCamp">
                    </div>
                    <div class="mb-3">
                        <label for="infoLinkCamp" class="form-label">Enlace de Información</label>
                        <input type="text" class="form-control" id="infoLinkCamp" name="infoLinkCamp">
                    </div>
                    <div class="mb-3">
                        <label for="fechaFinCamp" class="form-label">Fecha de Fin</label> 
                        <input type="date" class="form-control" id="fechaFinCamp" name="fechaFinCamp">
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-Enviar">Registrar Campaña</button>
                </div>
            </div>
        </form>
        <div id="response"></div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="./assets/js/registroCasJS.js"></script>
</html>