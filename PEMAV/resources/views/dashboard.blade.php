<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEMAV.</title>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('assets/estilos.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
</head>
<body>
    @include('layouts.navigation')
<section class="container my-5">
    <br><br>
    <h2>Anuncios:</h2>
    <br>
    @if (auth()->user()->role == '1')
    <div class="d-flex justify-content-end">
        <a href="{{ route('crear-anuncio') }}" class="btn btn-light text-white gradient-custom-2 me-2">Crear/Eliminar anuncio</a>
    </div>
    @endif
    <!-- Carrusel de anuncios -->
    <div id="carouselRecipes" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselRecipes" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselRecipes" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/imagen.jpg" class="d-block w-50 mx-auto" alt="Receta 1">
            </div>
            <div class="carousel-item">
                <img src="./images/imagen.jpg" class="d-block w-50 mx-auto" alt="Receta 2">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselRecipes" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselRecipes" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </a>
    </div>
</section>
<br><hr><br>

<section class="container my-5">
    <div>
        <h2>Asignaturas</h2>
        <br><br>
        <div class="row text-center">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 1" class="img-fluid">
                    <p style="padding-top: 20px;">Español</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Matemáticas</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 3" class="img-fluid">
                    <p style="padding-top: 20px;">Habilidad Matemática</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Habilidad Verbal</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Física</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Química</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Biología</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Historia</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Geografía</p>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                <a href="{{ route('asignatura') }}">
                    <img src="./images/imagen.jpg" alt="Imagen 2" class="img-fluid">
                    <p style="padding-top: 20px;">Formación Cívica y Ética</p>
                </a>
            </div>
        </div>
    </div>
</section>



        
    </div>
</section>

<footer class="footer gradient-custom-2" style="padding: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Texto a la izquierda -->
                <p class="nav-option" style="font-size: 3rem;">Cursos PEMAV©</p>
            </div>
            <div class="col-md-6 text-md-right">
                <!-- Enlaces a redes sociales y correo -->
                <a href="https://www.facebook.com/CURSOSPEMAVOFICIAL/?locale=es_LA" target="_blank" class="me-3 color-hover nav-option"><i class="fab fa-facebook icon-footer1"></i>  Facebook</a>
                <a href="https://www.instagram.com/cursos_pemav_oficial/" target="_blank" class="me-3 color-hover nav-option"><i class="fab fa-instagram icon-footer1"></i>  Instagram</a>
                <a href="https://wa.me/XXXXXXXXXX" target="_blank" class="me-3 color-hover nav-option"><i class="fa-brands fa-whatsapp"></i>  WhatsApp</a>
                <a href="mailto:correo@dominio.com" class="color-hover nav-option">
                    <i class="fa-regular fa-envelope" style="display: inline;"></i> correo@dominio.com
                </a>
            </div>
        </div>
    </div>
</footer>




<!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery al final del archivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>