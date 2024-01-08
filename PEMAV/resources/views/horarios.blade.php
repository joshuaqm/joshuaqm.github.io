<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horarios</title>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('assets/estilos.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
</head>
<body>
@include('layouts.navigation')
<div class="container mt-4">
    <h1 class="mb-4">Horarios</h1>
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
                <th>Hora</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 7; $i <= 22; $i++)
                <tr>
                    <td>{{ sprintf('%02d', $i) }}:00</td>
                    <td>Horario Lunes</td>
                    <td>Horario Martes</td>
                    <td>Horario Miércoles</td>
                    <td>Horario Jueves</td>
                    <td>Horario Viernes</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>



<!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery al final del archivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>