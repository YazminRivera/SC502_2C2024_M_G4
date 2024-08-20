<?php
require_once '../models/perfilAdopcionModel.php';

if (isset($_GET['id'])) {
    $idAnimal = $_GET['id'];
    perfilAdopcionModel::getConexion();
    $animal = perfilAdopcionModel::obtenerAnimalPorId($idAnimal);
    perfilAdopcionModel::desconectar();

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        echo json_encode($animal);
        exit;
    }
}
?>

<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Adopción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/perfilAdopcion.css">
</head>

<body>
    
    <?php
     include 'menu.php'; 
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

    <br><br><br>
    <div class="d-flex justify-content-center align-items-center">
        <div class="recuadro">
            <div class="container carousel-container">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carousel-inner">
                        <!-- Las imágenes se cargarán dinámicamente -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                        <img id="img1" class="img-thumbnail small-img w-100" alt="Imagen 1">
                    </div>
                    <div class="col-4">
                        <img id="img2" class="img-thumbnail small-img w-100" alt="Imagen 2">
                    </div>
                    <div class="col-4">
                        <img id="img3" class="img-thumbnail small-img w-100" alt="Imagen 3">
                    </div>
                </div>
            </div>
            <div class="container">
                <br>
                <h2 id="nombreMascota">Nombre de la Mascota</h2>
                <div class="row g-3">
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="especie" class="form-label">Especie</label>
                                <input type="text" id="especie" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="colorPelaje" class="form-label">Color de Pelaje</label>
                                <input type="text" id="colorPelaje" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type="text" id="edad" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="tamano" class="form-label">Tamaño</label>
                                <input type="text" id="tamano" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="raza" class="form-label">Raza</label>
                                <input type="text" id="raza" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="castracion" class="form-label">Castrado</label>
                                <input type="text" id="castracion" class="form-control">
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="ubi-container">
                        <label>Ubicación</label>
                        <div class="mapa"></div> <!--placeholder para la api-->
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a class="btn btnAdoptar" href="#">¡Enviar Formulario de Adopción!</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./assets/js/perfilAdopcion.js"></script>
</body>

</html>
