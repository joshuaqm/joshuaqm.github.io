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
@include('layouts.navigation')
@if (auth()->user()->role == '1')

<section class='container my-5'>
    <h1 class="mb-4">Subir calificaciones de nuevo examen</h1>
    <br>
    <form action="{{ route('nuevo-examen') }}" method="POST">
        @csrf
        <div class="col-md-6 exam-attributes">
            <p>Ingresa el tipo de examen:</p>
            <input type="text" name="tipo_examen" placeholder="Tipo de examen" class="form-control mb-2" required>
            <p>Ingresa el grado de examen:</p>
            <input type="text" name="grado_examen" placeholder="Grado de examen" class="form-control mb-2" required>
        </div>

    
    <br>
    <p>Ingresa las calificaciones de cada alumno:</p>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre del Alumno</th>
                <th>Calificación</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->name }}</td>
                <td><input type="number" name="calificaciones[{{ $usuario->nombre }}]" class="form-control" placeholder="Calificación" required></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Registrar examen</button>
    </form>
</section>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

@else
    <br>
    <div>
        <style>
            .autorizacion{
                padding-left: 4rem;
            }
        </style>
        <h1 class="autorizacion">No tienes autorización para ver esta página</h1>
    </div>
    
@endif
</body>

</html>