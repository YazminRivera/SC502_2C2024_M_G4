<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/registro.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <section class="container registro" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Registro</h3>
        <form action="" id="formRegistro" method="post">
            <input type="hidden" name="opcRegistro" value="guardar">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control text" id="nombreUsuario" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control text" id="correoUsuario" name="correo">
                    </div>
                    <div class="mb-3">
                        <label for="contraseña" class="form-label">Contraseña</label>
                        <input type="password" class="form-control text" id="contraseñaUsuario" name="contraseña">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control text" id="apellidoUsuario" name="apellido">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control text" id="telefonoUsuario" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="confirmarContraseña" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control text" id="confirmarContraseñaUsuario" name="confirmarContraseña">
                    </div>
                    <div class="col-12 mt-3 boton-end">
                        <button class="btn btn-Enviar" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>