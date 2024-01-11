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
<section class="container my-5">
    <h1 class="mb-4">Asignatura: {{$asignatura}}</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profesor</h5>
                    <p class="card-text">{{$profesor}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    @if (auth()->user()->role == '0')
                    <h5 class="card-title">Grupo</h5>
                    <p class="card-text">{{$idGrupo}}</p>
                    @elseif (auth()->user()->role == '2')
                    <h5 class="card-title">Seleccionar grupo: </h5>
                    <form action="{{ route('ver_grupo') }}" method="GET" id="grupoForm" class="mb-3">
                        <select name="grupo_id" id="grupo_id" class="form-control">
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->id_grupo }}" @if(request('grupo_id') == $grupo->id_grupo) selected @endif>
                                    Grupo: {{ $grupo->id_grupo }}
                                </option>
                            @endforeach
                        </select>
                        <div class="d-flex justify-content-end">
                            <button type="submit" form="grupoForm" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->role == '0')
                    <h5 class="card-title">Salón</h5>
                    <p class="card-text">{{$salon}}</p>
                    @elseif (auth()->user()->role == '2')
                    <h5 class="card-title">Salón</h5>
                    <p class="card-text">{{$salon}}</p>
                    @endif
                </div>
            </div>
        </div>
        
    </div><br>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->role == '0')
                    <h5 class="card-title">Días de clase:</h5>
                    <p class="card-text">{{$dias}}</p>
                    @elseif (auth()->user()->role == '2')
                    <h5 class="card-title">Días de clase:</h5>
                    <p class="card-text">{{$dias}}</p>
                    @endif

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->role == '0')
                    <h5 class="card-title">Hora de inicio</h5>
                    <p class="card-text">{{$horario_inicio}}</p>
                    @elseif (auth()->user()->role == '2')
                    <h5 class="card-title">Hora de inicio</h5>
                    <p class="card-text">{{$horario_inicio}}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->role == '0')
                    <h5 class="card-title">Hora de fin</h5>
                    <p class="card-text">{{$horario_fin}}</p>
                    @elseif (auth()->user()->role == '2')
                    <h5 class="card-title">Hora de fin</h5>
                    <p class="card-text">{{$horario_fin}}</p>
                    @endif
                </div>
            </div>
        </div>
        
    </div>


    <br><br><br>

    @if (auth()->user()->role == '0')

        <h3>Calificaciones de examenes:</h3>
            <div class="text-center mt-4">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        @foreach($calificaciones->where('id_asignatura', $asignaturaID) as $calificacion)
                        <th>Examen: {{ $calificacion->numero_examen }}</th>
                        @endforeach
                        <th>Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>{{ $alumno }}</td>
                    @foreach($calificaciones->where('id_asignatura', $asignaturaID) as $calificacion)
                        <td>{{ $calificacion->calificacion }}</td>
                    @endforeach
                    <td>{{ $promedioAsignatura }}</td>
                    </tr>
                </tbody>
            </table>
    @else
        <h3>Seleccionar acciones:</h3>
        <div class="col-lg-auto ml-auto">
            <br>
            <a href="{{ route('nuevo-examen') }}" class="btn btn-primary">Subir calificaciones de nuevo examen</a>
            <br>
        </div>
        <div>
            <br><br><br>
            <a href="{{ route('modificar-calificaciones') }}" class="btn btn-primary">Modificar calificaciones de examen existente</a>
        </div><br><br>
        <h2>Lista de alumnos:</h2>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID Alumno</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lista_alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id_alumno }}</td>
                        <td>{{ $alumno->alumno->name }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    @endif
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