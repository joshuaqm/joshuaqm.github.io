<!doctype html>
<html lang="es">

<head>
  <title>Asignaturas</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('assets/estilos.css') }}" rel="stylesheet">
</head>

<body>
<div class="header gradient-custom-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto">
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
<section class='container my-5'>
    <h1 class="mb-4">Asignatura: Asignatura n</h1>

    <div class="col-md-6 subject-attributes">
        <p>Profesor: Nombre del Profesor</p>
    </div>
    <div class="col-md-6 subject-attributes">
            <p>Grupos: Nombre(s) de los Grupos</p>
        </div>

    <div class="col-md-6 subject-attributes">
        <p>Salones: Número del Salón</p>
    </div>

    <br> 
    <hr>
    <h3>Seleccionar acciones:</h3>
    <div class="col-lg-auto ml-auto">
        <br>
        <a href="{{ route('perfil') }}" class="btn btn-primary">Subir calificaciones de nuevo examen</a>
        <br>
    </div>
    <div>
        <br><br><br>
        <a href="{{ route('perfil') }}" class="btn btn-primary">Modificar calificaciones de examen existente</a>
    </div>
</section>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>