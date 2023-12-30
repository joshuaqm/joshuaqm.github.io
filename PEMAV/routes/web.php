<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserProfileController;


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

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');

//profile
//Descomentar la siguiente línea para que se requiera autenticación para acceder al perfil cuando este la conexion con la base de datos
//Route::get('/perfil', [UserProfileController::class, 'show'])->name('perfil')->middleware('auth');
Route::get('/perfil', [UserProfileController::class, 'show'])->name('perfil');
