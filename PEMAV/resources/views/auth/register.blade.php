<!doctype html>
<html lang="es">

<head>
  <title>Registrarse en PEMAV</title>
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
              <a href="{{ route('home') }}">
                  <img src="{{ asset('images/PEMAV_logo.png') }}" alt="Descripción de la imagen" class="logo-header">
              </a>
            </div>
            <div class="col-lg">
                <a href="{{ route('home') }}" style="text-decoration: none; color: black;">
                <h3 class="header-text">PEMAV</h3>
                </a>
            </div>
            <div class="col-lg-auto">
                <button class="btn btn-outline-light" onclick="cerrarSesion()">Cerrar sesión</button>
            </div>
        </div>
    </div>
</div>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1 text-primary">Registrar nuevo usuario</h4>
                </div>

                <form action="{{route('register')}}" method="post">
                    @csrf
                  <div class="form-outline mb-4">
                    <label class="form-label text-primary" for="form2Example11">Nombre completo</label>
                    <input type="text" name="name" id="form2Example11" class="form-control"
                      placeholder="Ingresa tu nombre" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label text-primary" for="form2Example11">Correo electrónico</label>
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="Ingresa tu correo electrónico" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label text-primary" for="form2Example22">Contraseña</label>
                    <input type="password" name="password" id="form2Example22" class="form-control" />      
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label text-primary" for="form2Example22">Confirma la contraseña</label>
                    <input type="password" name="password_confirmation" id="form2Example22" class="form-control" />      
                  </div>

                  <div class="form-group mb-4">
                    <label class="text-primary" for="role_id">Tipo de usuario:</label>
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="1">Alumno</option>
                        <option value="2">Profesor</option>
                        <option value="3">Administrador</option>
                    </select>
                   </div>

                  <div class="form-outline mb-4">
                    <label class="form-label text-primary" for="form2Example22">Fecha de inscripción</label>
                    <input type="date" name="fecha_inscripcion" id="form2Example22" class="form-control" />
                  </div>

                  <div class="text-center pt-3 mb-5 pb-1"> <!-- Ajusta el valor de 'pt-3' para más espacio superior -->
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Registro</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h1 class="mb-4 text-primary">Registro en PEMAV.</h1>
                <h4 class="mb-2 text-dark">Calidad y experiencia.</h4>
              </div>
            </div>
          </div>
        </div>
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
</body>

</html>