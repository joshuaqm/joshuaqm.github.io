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
          @if (session('status'))
            <div class="text-center mb-4">{{ session('status') }}</div>
          @endif
          <form method="POST" action="{{ route('login') }}" class="text-center">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Por favor, ingresa tu correo electrónico para enviarte una contraseña temporal:</label>
              <input id="email" type="email" name="email" required autofocus class="form-control">
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <a href="{{ route('login') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar enlace para restablecer la contraseña</button>
            </div>

          </form>
        </div>    
</body>

</html>
