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
<section class='container my-5'>
    <h1>Modificar calificaciones de examen existente</h1>
    <br><br>
    <style>
        table {
            width: 80%; /* Ancho de la tabla */
            margin: auto; /* Centrar la tabla */
            border-collapse: collapse; /* Colapsar los bordes de la tabla */
        }
        th, td {
            padding: 10px; /* Añadir espaciado interno a las celdas */
            text-align: center; /* Centrar texto dentro de las celdas */
            border: 1px solid #000; /* Añadir bordes a las celdas */
        }
        th {
            background-color: #f2f2f2; /* Color de fondo para las celdas de encabezado */
        }
    </style>
    <table>
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Examen 1</th>
            <th>Examen 2</th>
            <th>Examen 3</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Alumno 1</td>
            <td>Calificacion Examen 1</td>
            <td>Calificacion Examen 1</td>
            <td>Calificacion Examen 1</td>
        </tr>
        <tr>
            <td>Alumno 2</td>
            <td>Calificacion Examen 2</td>
            <td>Calificacion Examen 2</td>
            <td>Calificacion Examen 2</td>
        </tr>
        <tr>
            <td>Alumno 3</td>
            <td>Calificacion Examen 3</td>
            <td>Calificacion Examen 3</td>
            <td>Calificacion Examen 3</td>
        </tr>

        </tr>
    </tbody>
    
    </table>
    <br><br><br>
    <style>
    .align-right {
        text-align: right;
    }
    </style>

    <div class="align-right">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
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