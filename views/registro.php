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
        <form action="" id="formRegistro" method="POST">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control text" id="nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="text" class="form-control text" id="correo" name="correo" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control text" id="contrasena" name="contrasena">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellido</label>
                        <input type="text" class="form-control text" id="apellidos" name="apellidos">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control text" id="telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="confirmarContraseña" class="form-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control text" id="confirmarContrasena" name="confirmarContraseña">
                    </div>
                    
                    <div class="col-12 mt-3 boton-end">
                        <button class="btn-Enviar" type="submit">Registrarse</button>
                    </div>
                </div>
                <input type="hidden" class="form-control text" id="rol" name="rol" value="user">
                <input type="hidden" class="form-control text" id="estado" name="estado" value="activo">
                <input type="hidden" id="existeModulo" name="existeModulo">
            </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="plugins/jquery/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="./assets/js/registro.js"></script>
</body>
</html>