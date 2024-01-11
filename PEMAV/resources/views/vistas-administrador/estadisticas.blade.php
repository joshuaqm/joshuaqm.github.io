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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
                                <option value="{{ $grupo->id_grupo }}" {{ $id_grupo == $grupo->id_grupo ? 'selected' : '' }}>
                                    {{ $grupo->asignatura->nombre_asignatura }}. Grupo: {{ $grupo->id_grupo }}
                                </option>
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
        <div class="row justify-content-center  ">
            <div class="">
                <div class="card mb-3 mx-3">
                    <div class="card-title text-center">
                        <h4>Lista de calificaciones por alumno:</h4>
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
                                <tr>
                                    <td></td> <!-- Celda vacía para alinear con las columnas de exámenes -->
                                    @foreach($examenes as $calificacion)
                                        <td>
                                            <button class="btn btn-primary" onclick="mostrarGrafica({{ $calificacion['numero_examen'] }})">
                                                Mostrar Gráfica
                                            </button>
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
            <script>
                function mostrarGrafica(numeroExamen) {
                    // Filtrar las calificaciones por el número de examen
                    if (@json($calificaciones) && @json($calificaciones) !== '[]') {
                        var calificacionesFiltradas = @json($calificaciones)->filter(function(calificacion) {
                            return calificacion.numero_examen === numeroExamen;
                        });
                        if (calificacionesFiltradas.length > 0) {
                            // Crear un objeto para contar las calificaciones
                            var calificacionesContadas = {};

                            calificacionesFiltradas.forEach(function (calificacion) {
                                var calificacionRedondeada = Math.round(calificacion.calificacion);
                                calificacionesContadas[calificacionRedondeada] = (calificacionesContadas[calificacionRedondeada] || 0) + 1;
                            });

                            // Convertir el objeto a arrays para Chart.js
                            var labels = Object.keys(calificacionesContadas);
                            var data = Object.values(calificacionesContadas);

                            // Crear la gráfica de pastel
                            var ctx = document.getElementById('miGrafica');
                            var myPieChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        data: data,
                                        backgroundColor: ['#FF5733', '#FFC300', '#DAF7A6', '#3498DB', '#AF7AC5'],
                                    }],
                                },
                            });

                            // Mostrar el modal con la gráfica de pastel
                            $('#miModal').modal('show');
                        } else {
                            // Manejar el caso en el que no hay calificaciones disponibles para el número de examen dado
                            console.log('No hay calificaciones disponibles para el número de examen dado');
                        }
                    } else {
                        // Manejar el caso en el que no hay calificaciones disponibles en absoluto
                        console.log('No hay calificaciones disponibles en absoluto');
                    }
                }
            </script>
            <p>{{$calificaciones}}</p>

            <div class="col-md-6 mb-4 justify-content-center">
                    <div class="card mb-3 mx-auto"> <!-- Agregada la clase mx-auto y limitado el ancho máximo -->
                        <div class="card-title text-center">
                            <h4 class="card-title mb-4">Gráfica de promedios:</h4>
                        </div>
                        <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Gráfica de Pastel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <canvas id="miGrafica"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
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