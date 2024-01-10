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
@if (auth()->user() && auth()->user()->role == '0')
<br>
    <div>
        <style>
            .autorizacion{
                padding-left: 4rem;
            }
        </style>
        <h1 class="autorizacion">No tienes autorización para ver esta página</h1>
    </div>
@else

<section class='container my-5'>
    <h2>Modificar calificaciones de exámenes</h2>
    <br>
    <div>
        <form action="{{ route('modificar-calificaciones') }}" method="GET">
            <div class="form-group">
                <label for="id_grupo"><h4>Filtrar grupos:</h4></label>
                <select class="form-control" name="id_grupo" id="id_grupo">
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id_grupo }}" @if(request('id_grupo') == $grupo->id_grupo) selected @endif>
                            {{ $grupo->asignatura->nombre_asignatura }}: Grupo {{ $grupo->id_grupo }}
                        </option>
                    @endforeach
                </select>
            </div><br>
            <button class="btn btn-primary" type="submit">Filtrar</button>
        </form>
    </div>

</section>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

@endif

</body>

</html>