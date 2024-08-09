<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Animales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/registroAnimal.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <section class="container registroAnimal" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Registro de Animales</h3>
        <form id="formRegistroAnimal">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tipoAnimal" class="form-label">Tipo de Animal</label>
                        <input type="text" class="form-control" id="tipoAnimal" name="tipoAnimal" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombreAnm" class="form-label">Nombre del Animal</label>
                        <input type="text" class="form-control" id="nombreAnm" name="nombreAnm" required>
                    </div>
                    <div class="mb-3">
                        <label for="edadAnm" class="form-label">Edad del Animal</label>
                        <input type="number" class="form-control" id="edadAnm" name="edadAnm" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="razaAnm" class="form-label">Raza del Animal</label>
                        <input type="text" class="form-control" id="razaAnm" name="razaAnm" required>
                    </div>
                    <div class="mb-3">
                        <label for="colorPelaje" class="form-label">Color de Pelaje</label>
                        <input type="text" class="form-control" id="colorPelaje" name="colorPelaje" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagenAnm" class="form-label">URL de la Imagen</label> 
                        <input type="text" class="form-control" id="imagenAnm" name="imagenAnm" required>
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-Enviar">Registrar Animal</button>
                </div>
            </div>
        </form>
        <div id="response"></div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="./assets/js/registroAnimalJS.js"></script>
</html>
