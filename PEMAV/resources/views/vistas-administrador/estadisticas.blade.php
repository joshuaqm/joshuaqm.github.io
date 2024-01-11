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
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (auth()->user()->role != '2')
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
        <style>
            .card{
                padding: 2rem;
            }
        </style>
    <section class='container my-5'>
        <p>{{$grupos}}</p><br>
        <p>{{$grupoFiltrado}}</p>
        <br>
        <h1>Estadísticas</h1><br><br>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card mb-3 mx-3">
                    <div class="card-title">
                        <h4>Filtrar estadísticas por grupo</h4>
                    </div>
                    <div class="card-body">
                        <p>Seleccionar el grupo:</p>
                        <form action="{{ route('estadisticas.filtrar') }}" method="GET">
                            @csrf
                            <select name="id_grupo" id="id_grupo" class="form-control">
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id_grupo }}">{{ $grupo->asignatura->nombre_asignatura }}. Grupo: {{ $grupo->id_grupo }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card mb-3 mx-3">
                    <div class="card-title">
                        <h4 class="card-title mb-4">Grupo seleccionado:</h4>
                        <h5> {{$nombre_asignatura}}</h5>
                    </div>
                    <div class="card-body">
                        <h6>Grupo: {{$id_grupo}}</h6>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <section class='container'>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3 mx-3">
                    <div class="card-title">
                        <h4>Lista de alumnos:</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre del Alumno</th>
                                    @php
                                        $examenes = collect($calificaciones)->unique('numero_examen');
                                    @endphp
                                    @foreach($examenes as $calificacion)
                                        <th>Examen: {{ $calificacion['numero_examen'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>

                            <tbody>
                                @foreach(collect($calificaciones)->groupBy('id_alumno') as $alumnoId => $calificacionesAlumno)
                                    <tr>
                                        <td>{{ $calificacionesAlumno->first()->alumno->name }}</td>
                                        @foreach($calificacionesAlumno as $exam)
                                            <td>{{ $exam->calificacion }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
            <div class="">
                <div class="card mb-3 mx-3">
                    <div class="card-title">
                        <h4 class="card-title mb-4">Gráfica de promedios:</h4>
                        
                    </div>
                    <div class="card-body">
                    </div>
                    
                </div>
            </div>
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