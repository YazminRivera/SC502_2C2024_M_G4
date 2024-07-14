<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/index.css">
</head>

<body>
    <header>
    <?php
        include 'menu.php';
    ?>
    </header>
    
<section id="carousel">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://i.ytimg.com/vi/932XRGF47nQ/maxresdefault.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://www.canalipe.tv/sites/default/files/styles/895x490/public/web/noticias/img_main/08-19/08-12-adopta.jpg?itok=zcUXQ3KJ" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://diariolaportada.com.ar/wp-content/uploads/2021/09/242373766_4753188301380635_4706435313204854438_n.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</section>

<section id="infoPag">
    <div id="quienes">
        <h1>¿Quienes Somos?</h1>
            <p>Somos un grupo de universitarios, nuestra mision es salvar, rehabilitar y encontrar hogares amorosos para animales sin hogar o en situacion de riesgo. Buscamos mejorar la vida de los animales en nuestra comunidad a traves de rescates, cuidados y educación.</p>
    </div>
    <div id="enfoque">
        <h1>Enfoque</h1>
            <p>Nuestra vision es un futuro donde todos los animales sean respetados y vivan libres de sufrimiento, abuso y explotacion.</p>
    </div>
    <div id="idea">
        <h1>Motivo</h1>
            <p>Debido a que la mayoria de anuncios de desaparicion, adopcion y castracion de animales se realizan por medio de publicaciones en redes sociales, buscamos centralizar estas noticias en un medio web donde los usuarios puedan ver diferentes secciones de adopcion, desaparicion e incluso rescate de animales que lo requieran.</p>
    </div>
    <div id="valores">
        <h1>Valores</h1>
            <p>Compromiso, compasión, transparencia y dedicación a la causa animal.</p>
    </div>
    <div id="invitacion">
        <h1>Te invitamos</h1>
            <p>Unete a nuestra causa como voluntario, donante o adoptante y ayuda a marcar la diferencia en la vida de un animal. Cada pequeño gesto cuenta.</p>
    </div>
</section>

<footer>
        <div class="footer">
            <container class="redes">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/800px-Instagram_logo_2022.svg.png" height="100" alt="instagram">
                <a href="https://www.instagram.com/">Instagram</a>
            </container>
            <container class="redes">
                <img src="https://p16-va-tiktok.ibyteimg.com/obj/musically-maliva-obj/4a2a1776a08f761c6464f596c0c5e8e6.png" height="100" alt="tiktok">
                <a href="https://www.tiktok.com/login?lang=es&redirect_url=https%3A%2F%2Fwww.tiktok.com%2Fupload%3Flang%3Des">TikTok</a>
            </container>
            <container class="redes">
                <img src="https://store-images.s-microsoft.com/image/apps.8453.13518859748920827.4d7dd838-9f34-4ad2-9cd7-b861c6398fc1.11cbb3d4-ffd9-42c1-82bd-e3f305d562b1" height="100" alt="whatsapp">
                <a href="https://www.whatsapp.com/?lang=es_LA">WhatsApp</a>
            </container>
            <container class="redes">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Logo_de_Facebook.png/220px-Logo_de_Facebook.png" height="100" alt="facebook">
                <a href="https://www.facebook.com/">Facebook</a>
            </container>
            </container>
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>