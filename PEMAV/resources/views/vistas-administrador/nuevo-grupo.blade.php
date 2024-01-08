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

<section class='container my-5'>
    <h1 class="mb-4">Crear nuevo grupo</h1>
    <br>
    <div class="container">
        <form action="{{ route('nuevo-grupo') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="id_grupo" class="form-label">Escriba el numero de grupo</label>
                <input type="text" class="form-control" id="id_grupo" name="id_grupo" required>
            </div>

            <div class="mb-3">
                <label for="id_asignatura" class="form-label">Seleccione asignatura:</label>
                <select name="id_asignatura" id="id_asignatura" class="form-control" required>
                    <option value="">Seleccionar Asignatura</option>
                    @foreach ($asignaturas as $asignatura)
                        <option value="{{ $asignatura }}">{{ $asignatura }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_profesor" class="form-label">Seleccione el profesor asignado:</label>
                <select name="id_profesor" id="id_profesor" class="form-control" required>
                    <option value="">Seleccionar Profesor</option>
                    @foreach ($profesores as $profesor)
                        <option value="{{ $profesor }}">{{ $profesor }}</option>
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