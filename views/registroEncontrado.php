<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Animales Encontrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/registroEncontrado.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <section class="container registroEncontrado" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Registro de Animales Encontrados</h3>
        <form id="formRegistroEncontrado">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="idAnimal" class="form-label">ID del Animal</label>
                        <input type="number" class="form-control" id="idAnimal" name="idAnimal" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubiEncontrado" class="form-label">Ubicación Encontrado</label>
                        <input type="text" class="form-control" id="ubiEncontrado" name="ubiEncontrado" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaEncontrado" class="form-label">Fecha Encontrado</label>
                        <input type="date" class="form-control" id="fechaEncontrado" name="fechaEncontrado" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="boolEncontrado" class="form-label">¿Encontrado?</label>
                        <input type="checkbox" class="form-check-input" id="boolEncontrado" name="boolEncontrado">
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-Enviar">Registrar Encontrado</button>
                </div>
            </div>
        </form>
        <div id="response"></div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="./assets/js/registroEncontradoJS.js"></script>
</html>
