<!DOCTYPE html>
<html>
<head>
<title>Restablecer contraseña</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('assets/estilos.css') }}" rel="stylesheet">
</head>
<body>
    <div class="header gradient-custom-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-auto">
                    <a href="{{ route('login') }}">
                        <img src="{{ asset('images/PEMAV_logo.png') }}" alt="Descripción de la imagen" class="logo-header">
                    </a>
                </div>
                <div class="col-lg">
                    <a href="{{ route('login') }}" style="text-decoration: none; color: black;">
                        <h3 class="header-text">PEMAV</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100 d-flex justify-content-center align-items-center">
    <div class="col-lg-6">
      <div class="card rounded-3 text-black">
        <div class="card-body p-md-5 mx-md-4">
          <h1 class="text-center mb-4">¿Olvidaste tu contraseña?</h1>
          <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <p>Por favor, ingresa tu correo electrónico para enviarte una contraseña temporal:</p><br>
                <x-input-label for="email" :value="__('Correo electrónico:')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <br>
            <div class="mb-3 d-flex justify-content-between">
                <br><br>
                <a href="{{ route('login') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
            </div>
        </form>
        </div>    
</body>

</html>
