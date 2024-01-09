<!doctype html>
<html lang="es">

<head>
  <title>Nuevo grupo</title>
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

<section class='container my-5'>
    <h1 class="mb-4">Crear nuevo grupo</h1>
    <br>
    <div class="container">
        <form action="{{ route('nuevo-grupo') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_asignatura" class="form-label">Seleccione asignatura:</label>
                <select name="id_asignatura" id="id_asignatura" class="form-control" required>
                    <option value="">Seleccionar Asignatura</option>
                    @foreach ($asignaturas as $id_asignatura => $id)
                        <option value="{{ $id_asignatura }}">{{ $id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_profesor" class="form-label">Seleccione el profesor asignado:</label>
                <select name="id_profesor" id="id_profesor" class="form-control" required>
                    <option value="">Seleccionar Profesor</option>
                    @foreach ($profesores as $id_profesor => $id)
                        <option value="{{ $id_profesor }}">{{ $id }}</option>
                    @endforeach
                </select>
            </div>



            <div class="mb-3">
                <label for="salon" class="form-label">Escriba el salón:</label>
                <input type="text" class="form-control" id="salon" name="salon" required>
            </div>

            <div class="mb-3">
                <label for="horario_inicio" class="form-label">Horario de Inicio:</label>
                <input type="time" class="form-control" id="horario_inicio" name="horario_inicio" required>
            </div>

            <div class="mb-3">
                <label for="horario_fin" class="form-label">Horario de Fin:</label>
                <input type="time" class="form-control" id="horario_fin" name="horario_fin" required>
            </div>

            <div class="mb-3">
                <label for="dias" class="form-label">Seleccionar los días de clases:</label><br>
                <input type="checkbox" id="lunes" name="dias[]" value="lunes">
                <label for="lunes">Lunes</label><br>
                <input type="checkbox" id="martes" name="dias[]" value="martes">
                <label for="martes">Martes</label><br>
                <input type="checkbox" id="miercoles" name="dias[]" value="miercoles">
                <label for="miercoles">Miércoles</label><br>
                <input type="checkbox" id="jueves" name="dias[]" value="jueves">
                <label for="jueves">Jueves</label><br>
                <input type="checkbox" id="viernes" name="dias[]" value="viernes">
                <label for="viernes">Viernes</label><br>
                <input type="checkbox" id="sabado" name="dias[]" value="sabado">
                <label for="sabado">Sábado</label><br>
            </div>
            <button type="submit" class="btn btn-primary">Crear Grupo</button>
        </form>
    </div>
</section>
<section class="container-my-5">
    <div class="container">
        <h1 class="mb-4">Grupos creados</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID Grupo</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Profesor</th>
                    <th scope="col">Salón</th>
                    <th scope="col">Horario de Inicio</th>
                    <th scope="col">Horario de Fin</th>
                    <th scope="col">Días</th>
                    <th scope="col">Modificar lista de alumnos</th>
                </tr>
            </thead>
            <tbody>
            
            @foreach ($grupos as $grupo)
                <tr>
                    <th scope="row">{{ $grupo->id_grupo }}</th>
                    <td>{{ $grupo->asignatura->nombre_asignatura }}</td>
                    <td>{{ $grupo->profesor->name }}</td>
                    <td>{{ $grupo->salon }}</td>
                    <td>{{ $grupo->horario_inicio->format('H:i') }}</td>
                    <td>{{ $grupo->horario_fin->format('H:i') }}</td>
                    <td>{{ $grupo->dias_seleccionados }}</td>
                    <td>
                        <a href="{{ route('ver-detalles', ['id_grupo' => $grupo->id_grupo]) }}" class="btn btn-primary">Modificar alumnos</a>
                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</section><br>
<section>
    <div class="container">
        <h1 class="mb-4">Eliminar grupo</h1>


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