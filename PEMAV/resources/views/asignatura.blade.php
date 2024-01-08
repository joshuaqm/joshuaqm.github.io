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
    <h1 class="mb-4">Asignatura: Asignatura n</h1>

    <div class="col-md-6 subject-attributes">
        <p>Profesor: Nombre del Profesor</p>
    </div>
    <div class="col-md-6 subject-attributes">
            <p>Grupo: Nombre del Grupo</p>
        </div>

    <div class="col-md-6 subject-attributes">
        <p>Salón: Número del Salón</p>
    </div>
    <div class="col-md-6 subject-attributes">
        <p>Calificación: Valor de la Calificación</p>
    </div>

    <br> 

    <h3>Calificaciones de examenes:</h3>
    <div class="text-center mt-4">
        
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
            <th></th>
            <th>Examen 1</th>
            <th>Examen 2</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Grado</td>
            <td>Grado</td>
            <td>Grado</td>

        </tr>
        <tr>
            <td>Tipo</td>
            <td>Tipo</td>
            <td>Tipo</td>

        </tr>
        <tr>
            <td>Calificacion</td>
            <td>Calificacion</td>
            <td>Calificacion</td>

        </tr>

    </tbody>
</table>
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