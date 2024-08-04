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
    ?>
    <br><br><br>
<!--mas adelante cambiar las imagenes para que correspondan con la especifica de las mascotas-->
    <div class="d-flex justify-content-center align-items-center">
        <div class="recuadro">
            <div class="container">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Mindo_Ecuador_1093.jpg" class="pfp" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.shutterstock.com/image-photo/calico-cat-tricolor-face-detail-260nw-2297256575.jpg" class="pfp" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://s.yimg.com/ny/api/res/1.2/4Tzx_f3_p3pQfLZtIOXUng--/YXBwaWQ9aGlnaGxhbmRlcjt3PTEyMDA7aD04MDA-/https://s.yimg.com/os/creatr-uploaded-images/2022-09/e4488eb0-3f74-11ed-bfbc-4db5b337addb" class="pfp" alt="Imagen 3">
                        </div>
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
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Mindo_Ecuador_1093.jpg" class="img-thumbnail small-img" alt="Imagen 1">
                    </div>
                    <div class="col-4">
                        <img src="https://www.shutterstock.com/image-photo/calico-cat-tricolor-face-detail-260nw-2297256575.jpg" class="img-thumbnail small-img" alt="Imagen 2">
                    </div>
                    <div class="col-4">
                        <img src="https://s.yimg.com/ny/api/res/1.2/4Tzx_f3_p3pQfLZtIOXUng--/YXBwaWQ9aGlnaGxhbmRlcjt3PTEyMDA7aD04MDA-/https://s.yimg.com/os/creatr-uploaded-images/2022-09/e4488eb0-3f74-11ed-bfbc-4db5b337addb" class="img-thumbnail small-img" alt="Imagen 3">
                    </div>
                </div>
            </div>
        <div class="container">
            <br>
            <h2>Zucarita</h2>
            <!--mas adelante cambiar todo con la informacion de la mascota, idk si con el placeholder o se puede mostrar la vara desde el input-->
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Especie</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Gato">
            </div>
        <br><br>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Peso</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="2kg">
            </div>
        </fieldset>
        <!--Arreglar lo del ancho-->
        <div class="container mt-4">
                <div class="ubi-container">
                    <label>Ubicación</label>
                    <div class="mapa"></div>    <!--placeholder para la api-->
                </div>
            </div>
        </div>
        <div class="container">
        <br>
        <h2 class="oculto">Nombre</h2>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Edad</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="3 meses">
            </div>
        <br><br>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Tamaño</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Pequeña">
            </div>
        </fieldset>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="d-flex justify-content-center mt-4">
            <a class="btn btnAdoptar" href="#">¡Adoptar!</a> <!--Esto probablemente tambien tenga que cambiarlo pero como use el display flex es un desmadre-->
        </div>
        </div>
        <div class="container">
        <br>
        <h2 class="oculto">Nombre</h2>
        <fieldset disabled>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Raza</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Calico">
            </div>
        <br><br>
            <div class="mb-3">
                <label for="disabledTextInput" class="form-label">Castrado</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="No">
            </div>
        </fieldset>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


