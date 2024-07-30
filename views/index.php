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

<section id="infoPag" class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="quienes">
                <h1>¿Quienes Somos?</h1>
                <p>Somos un grupo de universitarios dedicados y apasionados por el bienestar animal. Nuestra misión es salvar, rehabilitar y encontrar hogares amorosos para animales sin hogar o en situación de riesgo. Creemos firmemente que cada animal merece una segunda oportunidad y un hogar lleno de amor.</p>
                <p>Desde nuestros inicios, hemos trabajado incansablemente para rescatar animales en situación de abandono, brindándoles el cuidado y la atención médica que necesitan para recuperarse. Además, educamos a la comunidad sobre la importancia del trato humanitario hacia los animales y promovemos la adopción responsable.</p>
            </div>
            <div id="enfoque">
                <h1>Enfoque</h1>
                <p>Nuestra visión es un futuro donde todos los animales sean respetados y vivan libres de sufrimiento, abuso y explotación. Nos enfocamos en crear un entorno seguro y acogedor para todos los animales bajo nuestro cuidado, garantizando que reciban el amor y la atención que merecen.</p>
                <p>Trabajamos estrechamente con otras organizaciones y voluntarios para ampliar nuestro alcance y hacer una diferencia significativa en la vida de tantos animales como sea posible. Nuestra red de apoyo nos permite responder rápidamente a situaciones de emergencia y ofrecer soluciones efectivas y compasivas.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div id="idea">
                <h1>Motivo</h1>
                <p>Debido a que la mayoría de anuncios de desaparición, adopción y castración de animales se realizan por medio de publicaciones en redes sociales, buscamos centralizar estas noticias en un medio web donde los usuarios puedan ver diferentes secciones de adopción, desaparición e incluso rescate de animales que lo requieran.</p>
                <p>Este portal web nos permite proporcionar información actualizada y accesible sobre las actividades y eventos relacionados con el bienestar animal. Facilita la conexión entre adoptantes potenciales y animales necesitados, y proporciona una plataforma para reportar y encontrar animales perdidos de manera eficiente.</p>
            </div>
            <div id="valores">
                <h1>Valores</h1>
                <p>Nuestros valores fundamentales incluyen el compromiso, la compasión, la transparencia y la dedicación a la causa animal. Cada acción que emprendemos está guiada por nuestro profundo amor y respeto por los animales.</p>
                <p>Creemos en la transparencia en todas nuestras operaciones y en la rendición de cuentas ante nuestros voluntarios, adoptantes y la comunidad en general. Nos esforzamos por mantener altos estándares éticos y operativos en todas nuestras actividades, asegurando que cada animal reciba el mejor cuidado posible.</p>
            </div>
        </div>
        <div id="invitacion">
                <h1>Te invitamos</h1>
                <p>Únete a nuestra causa como voluntario, donante o adoptante y ayuda a marcar la diferencia en la vida de un animal. Cada pequeño gesto cuenta y juntos podemos crear un impacto positivo duradero.</p>
                <p>Ya sea que desees ofrecer tu tiempo, hacer una donación o abrir tu hogar a un animal necesitado, tu apoyo es invaluable para nosotros. Únete a nuestra comunidad de amantes de los animales y sé parte del cambio que queremos ver en el mundo.</p>
            </div>
    </div>
</section>

<footer>
<?php
        include 'footer.php';
    ?>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>