<div class="header gradient-custom-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto">
            <!-- Enlace con la imagen -->
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/PEMAV_logo.png') }}" alt="Descripción de la imagen" class="logo-header">
                </a>
            </div>

            <div class="col-lg text-center">
                <!-- Opciones centradas -->
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Botón para colapsar la barra de navegación en dispositivos móviles -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Elementos de la barra de navegación -->
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link nav-option" href="{{ route('dashboard')}}">Horarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-option" href="{{ route('dashboard')}}">Asistencias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-option" href="{{ route('dashboard')}}">Calificaciones</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-lg-auto ml-auto">
                <div class="d-flex align-items-center">
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-light me-2">Perfil</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">
                                {{ __('Cerrar sesión') }}
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
