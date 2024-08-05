<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Desapariciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/registroDesaparicion.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <section class="container registroDesaparicion" style="margin-top: 60px;">
        <center><img src="https://cdn-icons-png.flaticon.com/512/5871/5871586.png" alt="Logo" style="height: 80px; margin-top: 15px;"></center>
        <h3 class="text-center" style="color:white;margin-top:20px;">Registro de Desapariciones</h3>
        <form id="formRegistroDesaparicion">
            <div class="col-12 d-flex flex-wrap">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="idAnimal" class="form-label">ID del Animal</label>
                        <input type="number" class="form-control" id="idAnimal" name="idAnimal" required>
                    </div>
                    <div class="mb-3">
                        <label for="ubiDesaparicion" class="form-label">Ubicación de la Desaparición</label>
                        <input type="text" class="form-control" id="ubiDesaparicion" name="ubiDesaparicion" required>
                    </div>
                    <div class="mb-3">
                        <label for="fechaDesaparicion" class="form-label">Fecha de Desaparición</label>
                        <input type="date" class="form-control" id="fechaDesaparicion" name="fechaDesaparicion" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="boolDesaparecido" class="form-label">¿Desaparecido?</label>
                        <input type="checkbox" class="form-check-input" id="boolDesaparecido" name="boolDesaparecido">
                    </div>
                </div>
                <div class="col-12 mt-3 text-center">
                    <button type="submit" class="btn btn-Enviar">Registrar Desaparición</button>
                </div>
            </div>
        </form>
        <div id="response"></div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
<script src="./assets/js/registroDesaparicionJS.js"></script>
</html>
