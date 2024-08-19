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
    <section>
        <form action="" method="post" id="formInicioSesion">
            <div class="container">
                <img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 100px;">
                <h2> Iniciar <br> Sesión</h2>
                <div class="container-form">
                    <div class="mb-3">
                        <label for="correoInicio" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" placeholder="name@example.com" name="correo">
                    </div>
                    <label for="contraInicio" class="form-label">Contraseña</label>
                    <input type="password" id="contrasena" class="form-control" aria-describedby="passwordHelpBlock" name="contrasena">
                    <div id="passwordHelpBlock" class="form-text">
                    </div>
                </div>
                <button type="button" class="btn btnOlvidar">¿Olvidaste la contraseña?</button>
                <br>
                <button class="btn btnIniciarSesion" type="submit">Iniciar Sesión</button>
                <h5> o </h5>
                <a class="btn btnRegistrar" href="./registro.php">Registrarse</a>
            </div>
        </form>
    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="plugins/jquery/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
<script src="plugins/bootbox/bootbox.min.js"></script>
<script src="plugins/toastr/toastr.js"></script>
<script src="./assets/js/inicioSesion.js"></script>

</html>