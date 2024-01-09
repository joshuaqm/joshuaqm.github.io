<!doctype html>
<html lang="es">

<head>
  <title>Agregar alumnos</title>
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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Resto de tu código HTML -->

<section class="container my-5">
    <h1 class="mb-4">Inscribir alumnos en grupo: {{ $grupo->id_grupo }}</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Detalles del Grupo</h3>
            <div class="card-text">
                <p class="mb-2"><strong>ID Grupo:</strong> {{ $grupo->id_grupo }}</p>
                <p class="mb-2"><strong>Asignatura:</strong> {{ $grupo->asignatura->nombre_asignatura }}</p>
                <p class="mb-2"><strong>Profesor:</strong> {{ $grupo->profesor->name }}</p>
            </div>
        </div>
    </div>
<section class="container my-5">
    <h1 class="mb-4">Alumnos inscritos en el grupo: </h1>
    <div class="mt-4">
        <p>Aquí se muestran los alumnos inscritos en el grupo número {{ $grupo->id_grupo }}</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                    <!-- Foreach -->
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar del Grupo</button>
                            </form>
                        </td>
                    </tr>
                    <!-- End Foreach -->    
            </tbody>
        </table>
    </div>
</section><br>
<section>
    <div class="mt-4">
        <h1 class="mb-4">Añadir alumnos al grupo: </h1>
        <p>Aquí se muestran todos los alumnos registrados en el sistema</p>
        <p>Actualmente hay {{ $total_alumnos }} alumno(s) registrados en el sistema</p>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->name }}</td>
                        <td>{{ $alumno->email}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Agregar al Grupo</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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