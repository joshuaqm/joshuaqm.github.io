<!doctype html>
<html lang="es">

<head>
  <title>Crear anuncios</title>
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
    <section class='container my-5'>
        <h1 class="mb-4">Crear anuncio</h1>
        <br>
        <form action="{{ route('crear-anuncio') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 exam-attributes">
                <p>Ingresa el título de la publicación:</p>
                <input type="text" name="title" placeholder="Título" class="form-control mb-2" required>
                <p>Ingresa una breve descripción:</p>
                <input type="text" name="description" placeholder="Descripción" class="form-control mb-2" required>
                <p>Selecciona una imagen:</p>
                <input type="file" id="image" name="image" class="form-control mb-2" accept="image/jpeg, image/png" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Crear Anuncio</button>
        </form>

        <h1 class="mt-4">Anuncios existentes</h1>
        <div class="row">
            @foreach($imagenes as $imagen)
            <div class="col-md-3 mt-3">
                <img src="{{ route('show-image', $imagen->id) }}" alt="Imagen" class="img-fluid mb-2">
                <p class="mb-2"><strong>Título:</strong> {{ $imagen->title }}</p>
                <p class="mb-2"><strong>Descripción:</strong> {{ $imagen->description }}</p>
                <p class="mb-2"><strong>Fecha de creación:</strong> {{ $imagen->created_at }}</p>
                <form action="{{ route('eliminar-anuncio', $imagen->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            @endforeach
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