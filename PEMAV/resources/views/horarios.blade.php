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
    <script src="{{ asset('js/calendario.js') }}"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    
</head>
<body>
@include('layouts.navigation')
<section class="my-5">
<table>
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
    </thead>
    <tbody id="calendario">
        <!-- Aquí se generará dinámicamente el contenido del calendario -->
    </tbody>
</table>

<script>
    const grupos = <?php echo json_encode($grupos); ?>;
    console.log(grupos); // Verificar si los datos se están pasando correctamente

    const horas = [];
    for (let i = 7; i <= 22; i++) {
        horas.push(i.toString().padStart(2, '0') + ':00');
    }

    function crearCalendario() {
    const tbody = document.getElementById('calendario');

    horas.forEach(hora => {
        const fila = document.createElement('tr');
        const horaColumna = document.createElement('td');
        horaColumna.textContent = hora;
        fila.appendChild(horaColumna);

        const diasSemana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        for (let i = 0; i < 7; i++) {
            const columna = document.createElement('td');
            const diaActual = diasSemana[i];

            const horariosEnEsteMomento = grupos.filter(grupo =>
                obtenerDiasSeleccionados(grupo.dias_seleccionados).includes(diaActual.toLowerCase()) &&
                esHoraEnRango(hora, grupo.horario_inicio, grupo.horario_fin)
            );

            if (horariosEnEsteMomento.length > 0) {
                const detalles = horariosEnEsteMomento.map(grupo => {
                    const horaInicio = grupo.horario_inicio.slice(11, 16);
                    const horaFin = grupo.horario_fin.slice(11, 16);

                    return `${grupo.id_asignatura}:<br>Grupo: ${grupo.id_grupo}<br>Salon: ${grupo.salon}
                        <br>Inicio: ${horaInicio}<br>Fin: ${horaFin}`;
                }).join('<br>');

                columna.innerHTML = detalles;
            }

            fila.appendChild(columna);
        }

        tbody.appendChild(fila);
    });
}

function esHoraEnRango(hora, horaInicioGrupo, horaFinGrupo) {
    const horaActual = parseInt(hora.slice(0, 2)); // Obtener solo la hora de la hora actual
    const horaInicio = parseInt(horaInicioGrupo.slice(11, 13)); // Obtener solo la hora de inicio del grupo
    const horaFin = parseInt(horaFinGrupo.slice(11, 13)); // Obtener solo la hora de fin del grupo

    return horaActual >= horaInicio && horaActual < horaFin;
}


    // Obtener los días seleccionados como un array de días de la semana
    function obtenerDiasSeleccionados(diasSeleccionados) {
        try {
            return JSON.parse(diasSeleccionados.replace(/\\/g, ''));
        } catch (error) {
            console.error('Error al convertir días seleccionados:', error);
            return [];
        }
    }

    crearCalendario();
</script>
</section>

<!-- Agregar enlaces a los archivos JavaScript de Bootstrap y jQuery al final del archivo HTML -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>