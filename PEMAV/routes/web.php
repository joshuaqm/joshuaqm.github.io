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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
//Route::get('/asignatura', [AsignaturaController::class, 'index'])->name('asignatura')->middleware('auth');
Route::get('/asignatura', [AsignaturaController::class, 'index'])->name('asignatura');
//Route::get('/asignatura/{nombre}', 'AsignaturaController@showAsignatura')->name('asignatura');

//asignatura-profesor
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
//Route::get('/asignatura-profesor', [AsignaturaProfesorController::class, 'index'])->name('asignatura-profesor')->middleware('auth');
Route::get('/asignatura-profesor', [AsignaturaProfesorController::class, 'index'])->name('asignatura-profesor');

//nuevo-examen
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
//Route::get('/nuevo-examen', [NuevoExamenController::class, 'index'])->name('nuevo-examen')->middleware('auth');
Route::get('/nuevo-examen', [NuevoExamenController::class, 'index'])->name('nuevo-examen');
Route::get('/nuevo-examen', [NuevoExamenController::class, 'mostrarVista'])->name('nuevo-examen');

//modificar-calificaciones
//Descomentar la siguiente línea para que se requiera autenticación para acceder a las asignaturas cuando este la conexion con la base de datos
//Route::get('/modificar-calificaciones', [ModificarCalificacionesController::class, 'index'])->name('modificar-calificaciones')->middleware('auth');
Route::get('/modificar-calificaciones', [ModificarCalificacionesController::class, 'index'])->name('modificar-calificaciones');
