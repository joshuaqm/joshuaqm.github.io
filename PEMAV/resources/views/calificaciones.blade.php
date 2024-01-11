<!doctype html>
<html lang="es">

<head>
  <title>Calificaciones</title>
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
  <section class='container my-5'>
    <h1 class="mb-4">Calificaciones por asignatura</h1>
    <div class='text-center'>
      <h3>Español</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 1) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 1) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioEspañol }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Matemáticas</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 2) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 2) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioMatematicas }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Habilidad Matemática</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 3) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 3) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Habilidad Verbal</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 4) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 4) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Física</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 5) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 5) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Química</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 6) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 3) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Biología</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 7) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 7) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Historia</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 8) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 8) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Geografía</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 9) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 9) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

    <div class='text-center'>
      <h3>Formación Cívica y Ética</h3>
      <table>
        <thead>
            <tr>
                <th>Nombre</th>
                @foreach($calificaciones->where('id_asignatura', 10) as $calificacion)
                  <th>Examen: {{ $calificacion->numero_examen }}</th>
                @endforeach
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{ $alumno }}</td>
              @foreach($calificaciones->where('id_asignatura', 10) as $calificacion)
                <td>{{ $calificacion->calificacion }}</td>
              @endforeach
              <td>{{ $promedioHabilidadMatematica }}</td>
            </tr>
        </tbody>
      </table>
    </div><br><br>

  </section>

<br>
<div class='text-center'>
    <h3>Promedio Total: {{ $promedioTotal }}</h3>
</div><br><br>

  <footer class="footer gradient-custom-2" style="padding: 50px">

  </footer>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>