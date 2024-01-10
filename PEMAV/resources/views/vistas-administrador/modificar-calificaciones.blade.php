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
            <form action="{{ route('filtrar-grupos') }}" method="GET">
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

    <section class='container my-5'>
    <script>
        $(document).ready(function() {
            // Escucha los cambios en los campos de entrada con la clase "calificacionInput"
            $('.calificacionInput').on('input', function() {
                var alumnoId = $(this).data('alumno-id');
                var examenNumero = $(this).data('examen-numero');
                var calificacion = $(this).val();

                // Realiza una solicitud AJAX para guardar la calificación
                $.ajax({
                    method: 'POST',
                    url: '{{ route('modificar-calificaciones.post') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        alumno_id: alumnoId,
                        examen_numero: examenNumero,
                        calificacion: calificacion
                    },
                    success: function(response) {
                        console.log('Calificación guardada exitosamente');
                        // Puedes agregar aquí alguna lógica para actualizar la interfaz si es necesario
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al guardar la calificación:', error);
                    }
                });
            });
        });
    </script>
        <div>
            <p>Modifica las calificaciones deseadas:</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre del Alumno</th>
                            @php
                                $examenes = [];
                            @endphp
                            @foreach($calificaciones as $calificacion)
                                @php
                                    $examenes[$calificacion->numero_examen] = true;
                                @endphp
                            @endforeach
                            @foreach($examenes as $numero_examen => $value)
                                <th>Examen: {{$numero_examen}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $alumnos = collect();
                        @endphp
                        @foreach($calificaciones as $calificacion)
                            @php
                                $alumno = $calificacion->alumno;
                                if(!$alumnos->contains('id', $alumno->id)){
                                    $alumnos->push($alumno);
                                }
                            @endphp
                        @endforeach
                        @foreach($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->name }}</td>
                                @foreach($examenes as $numero_examen => $value)
                                    <td>
                                        @php
                                            $calificacionEncontrada = null;
                                            foreach ($calificaciones as $calificacion) {
                                                if($calificacion->id_alumno === $alumno->id && $calificacion->numero_examen === $numero_examen) {
                                                    $calificacionEncontrada = $calificacion;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        @if($calificacionEncontrada)
                                            <form method="POST" action="{{ route('modificar-calificaciones.post', ['id' => $calificacionEncontrada->id]) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="calificacion" value="{{ $calificacionEncontrada->calificacion }}">
                                            </form>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end">
            <form method="POST" action="{{ route('modificar-calificaciones.post') }}">
                @csrf
                <input type="hidden" name="alumno_id" value="{{ $alumnoId }}">
                <input type="hidden" name="examen_numero" value="{{ $examenNumero }}">
                <input type="hidden" class="calificacionInput" data-alumno-id="{{ $alumnoId }}" data-examen-numero="{{ $examenNumero }}" name="calificacion" value="{{ $calificacion }}">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
    </section>




  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

@endif

</body>

</html>