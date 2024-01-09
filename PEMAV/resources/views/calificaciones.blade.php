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
<h1 class="mb-4">Calificaciones</h1>
<br>
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
            <th>Asignatura</th>
            <th>Primer Periodo</th>
            <th>Segundo Periodo</th>
            <th>Tercer Periodo</th>
            <th>Promedio de asignatura</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Asignatura 1</td>
            <td>Calificacion Asignatura 1</td>
            <td>Calificacion Asignatura 1</td>
            <td>Calificacion Asignatura 1</td>
            <td>Promedio Asignatura 1</td>
        </tr>
        <tr>
            <td>Asignatura 2</td>
            <td>Calificacion Asignatura 2</td>
            <td>Calificacion Asignatura 2</td>
            <td>Calificacion Asignatura 2</td>
            <td>Calificacion Asignatura 2</td>
        </tr>
        <tr>
            <td>Asignatura 3</td>
            <td>Calificacion Asignatura 3</td>
            <td>Calificacion Asignatura 3</td>
            <td>Calificacion Asignatura 3</td>
            <td>Promedio Asignatura 3</td>
        </tr>
        <tr>
            <td>Asignatura 4</td>
            <td>Calificacion Asignatura 4</td>
            <td>Calificacion Asignatura 4</td>
            <td>Calificacion Asignatura 4</td>
            <td>Promedio Asignatura 4</td>
        </tr>
        <tr>
            <td>Promedio del periodo</td>
            <td>Primer Periodo</td>
            <td>Segundo Periodo</td>
            <td>Tercer Periodo</td>
            <td>Promedio Final</td>
        </tr>
    </tbody>
</table>

</section>

<br>
<div class='text-center'>
    <h3>Promedio Final:</h3>
</div>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>