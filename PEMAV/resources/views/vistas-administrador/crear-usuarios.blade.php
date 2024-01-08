<!doctype html>
<html lang="es">

<head>
  <title>Registrar usuarios</title>
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
@if (auth()->user()->role == '1')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center align-items-start"> <!-- Alinieación de elementos arriba -->
                <div class="col-lg-6 mb-4"> <!-- Columna izquierda -->
                    <div class="card rounded-3 text-black">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <h4 class="mt-1 mb-5 pb-1 text-primary">Registrar nuevo usuario</h4>
                            </div>
                            <form method="POST" action="{{ route('crear-usuarios') }}">
                                        @csrf
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Nombre completo:')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Correo electrónico:')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password" :value="__('Contraseña:')" />

                                        <x-text-input id="password" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password"
                                                        required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirmar contraseña:')" />

                                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                    <div class="mt-4">
                                        <x-input-label for="role" :value="__('Tipo de usuario:')" />

                                        <select id="role" class="block mt-1 w-full" name="role" required>
                                            <option value="" selected disabled>Seleccionar tipo de usuario</option>
                                            <option value="0">Alumno</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Profesor</option>
                                        </select>

                                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                                    </div>
                                    <div class="flex items-center justify-end mt-4 text-center">
                                        <x-primary-button class="btn gradient-custom-2 ms-4">
                                            {{ __('Registro') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4"> <!-- Columna derecha -->
                    <div class="card rounded-3 text-black">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <h4 class="mt-1 mb-5 pb-1 text-primary">Dar de baja usuario</h4>
                            </div>
                            <!-- Contenido para dar de baja usuario -->
                        </div>
                    </div>
                </div>

            <div>
                <h4 class="mt-1 mb-5 pb-1 text-primary">Administradores registrados:</h4>

            </div>
            <div>
                <h4 class="mt-1 mb-5 pb-1 text-primary">Profesores registrados:</h4>
            </div>
            <div>
                <h4 class="mt-1 mb-5 pb-1 text-primary">Alumnos registrados:</h4>
            </div>
            

            </div>
        </div>
    </section>
    



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

@else
    <br>
    <div>
        <style>
            .autorizacion{
                padding-left: 4rem;
            }
        </style>
        <h1 class="autorizacion">No tienes autorización para ver esta página</h1>
    </div>
    
@endif
</body>

</html>