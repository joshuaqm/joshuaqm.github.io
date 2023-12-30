<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CalificacionesController;


//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


Route::get('/', function () {
    return view('welcome');
});

//register
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

//forgot-password  
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


//home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//profile
//Descomentar la siguiente línea para que se requiera autenticación para acceder al perfil cuando este la conexion con la base de datos
//Route::get('/perfil', [UserProfileController::class, 'show'])->name('perfil')->middleware('auth');
Route::get('/perfil', [UserProfileController::class, 'show'])->name('perfil');

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