<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\AsignaturaProfesorController;
use App\Http\Controllers\NuevoExamenController;
use App\Http\Controllers\ModificarCalificacionesController;
use App\Http\Controllers\NuevoGrupoController;
use App\Http\Controllers\CrearUsuariosController;
use App\Http\Controllers\CarrouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgregarAlumnosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/show-image/{id}', [DashboardController::class, 'showImage'])->name('show-image');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';


//horarios
//Descomentar la siguiente línea para que se requiera autenticación para acceder a los horarios cuando este la conexion con la base de datos
//Route::get('/horarios', [HorariosController::class, 'index'])->name('horarios')->middleware('auth');
Route::get('/horarios', [HorariosController::class, 'index'])->name('horarios');

//calendario
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario');

//calificaciones
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las calificaciones cuando este la conexion con la base de datos
//Route::get('/calificaciones', [CalificacionesController::class, 'index'])->name('calificaciones')->middleware('auth');
Route::get('/calificaciones', [CalificacionesController::class, 'index'])->name('calificaciones');

//asignatura
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
Route::get('/asignatura/{id_asignatura}', [AsignaturaController::class, 'index'])->name('asignatura');

//asignatura-profesor
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
//Route::get('/asignatura-profesor', [AsignaturaProfesorController::class, 'index'])->name('asignatura-profesor')->middleware('auth');
Route::get('/asignatura-profesor', [AsignaturaProfesorController::class, 'index'])->name('asignatura-profesor');
Route::get('/ver-grupo', [AsignaturaController::class, 'verGrupo'])->name('ver_grupo');

//nuevo-examen
Route::get('/nuevo-examen', [NuevoExamenController::class, 'index'])->name('nuevo-examen');
Route::get('/nuevo-examen/filtrar', [NuevoExamenController::class, 'filtrarGrupos'])->name('nuevo-examen.filtrar');
Route::post('/nuevo-examen/store', [NuevoExamenController::class, 'store'])->name('nuevo-examen.store');

//modificar-calificaciones
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
Route::get('/modificar-calificaciones', [ModificarCalificacionesController::class, 'index'])->name('modificar-calificaciones');
Route::get('/filtrar-grupos', [ModificarCalificacionesController::class, 'filtrarGrupos'])->name('filtrar-grupos');
Route::post('/modificar-calificaciones', [ModificarCalificacionesController::class, 'modificarCalificaciones'])->name('modificar-calificaciones.post');


//nuevo-grupo
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
//Route::get('/nuevo-grupo', [NuevoGrupoController::class, 'index'])->name('nuevo-grupo')->middleware('auth');
Route::get('/nuevo-grupo', [NuevoGrupoController::class, 'index'])->name('nuevo-grupo');
Route::post('/nuevo-grupo', [NuevoGrupoController::class, 'store'])->name('nuevo-grupo');
Route::get('/nuevo-grupo', [NuevoGrupoController::class, 'create'])->name('nuevo-grupo');
Route::post('/nuevo-grupo', [NuevoGrupoController::class, 'dias'])->name('nuevo-grupo');
Route::post('/nuevo-grupo/{id_grupo}', [NuevoGrupoController::class, 'destroy'])->name('eliminar-grupo');

//crear-usuarios
Route::get('/crear-usuarios', [CrearUsuariosController::class, 'index'])->name('crear-usuarios');
Route::get('/crear-usuarios', [CrearUsuariosController::class, 'verUsuarios'])->name('crear-usuarios');
Route::post('/crear-usuarios/store', [CrearUsuariosController::class, 'store'])->name('crear-usuarios-store');
Route::post('/crear-usuarios/eliminar', [CrearUsuariosController::class, 'eliminarUsuario'])->name('crear-usuarios-eliminar');

//crear-anuncio
Route::get('/crear-anuncio', [CarrouselController::class, 'index'])->name('crear-anuncio');
Route::post('/crear-anuncio', [CarrouselController::class, 'store'])->name('crear-anuncio');
Route::delete('/crear-anuncio/{id}', [CarrouselController::class, 'destroy'])->name('eliminar-anuncio');
Route::get('/show-image/{id}', [CarrouselController::class, 'showImage'])->name('show-image');

//agregar-alumnos
Route::get('/agregar-alumnos/{id_grupo}', [AgregarAlumnosController::class, 'verDetalles'])->name('ver-detalles');
Route::post('/agregar-alumnos/{id_grupo}/agregar-alumno/{id_alumno}', [AgregarAlumnosController::class, 'agregarAlumno'])->name('agregar-alumno');
Route::post('/agregar-alumnos/{id_grupo}/eliminar-alumno/{id_alumno}', [AgregarAlumnosController::class, 'eliminarAlumno'])->name('eliminar-alumno');
