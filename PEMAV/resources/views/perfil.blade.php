<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
<div class="header gradient-custom-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto">
            <!-- Enlace con la imagen -->
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/PEMAV_logo.png') }}" alt="Descripción de la imagen" class="logo-header">
                </a>
            </div>
            <div class="col-lg">
                <a href="{{ route('home') }}" style="text-decoration: none; color: black;">
                <h3 class="header-text">PEMAV</h3>
                </a>
            </div>
            <div class="col-lg-auto">
                <button class="btn btn-outline-light" onclick="cerrarSesion()">Cerrar sesión</button>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
        <h1 class="mb-4">Perfil de Usuario</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Datos Personales</h5>
                <div class="mb-3">
                    <strong>Nombre completo:</strong>
                    
                </div>
                <div class="mb-3">
                    <strong>Correo electrónico:</strong>
                    
                </div>
                <div class="mb-3">
                    <strong>Tipo de usuario:</strong>
                    
                </div>
                <div class="mb-3">
                    <strong>Clave de usuario:</strong>
                    
                </div>
                <div class="mb-3">
                    <strong>Fecha de inscripción:</strong>
                    
                </div>
            </div>
        </div>
    </div>



<!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery al final del archivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>