<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/inicioSesion.css">
</head>

<body>
    <?php
        include 'menu.php';
    ?>
    <br><br><br><br><br><br>
    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 100px;">
        <h2> Iniciar <br> Sesión</h2>
    <div class="container-form">
            <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correoInicio" placeholder="name@example.com">
        </div>
            <label for="contrasena" class="form-label">Contraseña</label>
            <input type="password" id="contraInicio" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
        </div>
    </div>
    <button type="button" class="btn btnOlvidar">¿Olvidaste la contraseña?</button>
    <br>
    <a class="btn btnIniciarSesion" href="#">Iniciar Sesión</a>
    <h5> o </h5>
    <a class="btn btnRegistrar" href="#">Registrarse</a>
</div>
    


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>