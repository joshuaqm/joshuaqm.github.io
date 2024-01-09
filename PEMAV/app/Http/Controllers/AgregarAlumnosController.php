    <?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Grupo;
    use App\Models\User;

    class AgregarAlumnosController extends Controller
    {
        public function index()
        {        
            return view('vistas-administrador.agregar-alumnos', ['alumnos' => $alumnos]);
        }

        public function verDetalles($id_grupo)
        {
            $alumnos = User::where('role', 0)->get();
            $total_alumnos = $alumnos->count();

            // Obtener los detalles completos del grupo usando el ID recibido
            $grupo = Grupo::with('asignatura', 'profesor')->find($id_grupo);

            // Pasar los detalles del grupo y otras variables a la vista 'agregar-alumnos'
            return view('vistas-administrador.agregar-alumnos', [
                'grupo' => $grupo,
                'alumnos' => $alumnos,
                'total_alumnos' => $total_alumnos
            ]);
    }


    }
