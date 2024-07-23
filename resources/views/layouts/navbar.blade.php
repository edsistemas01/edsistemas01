<!-- resources/views/partials/navbar.blade.php -->

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Autenticado -->
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/doctors') }}">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/patients') }}">Paciente</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/historys') }}">Historia Clínica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/reports') }}">Reporte</a>
                    </li>
                @endauth
            </ul>

            <!-- Mensajes -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success mt-2">
                            {{ $message }}
                        </div>
                    @endif
                </li>
            </ul>

            <!-- Autenticación -->
            <ul class="navbar-nav ms-auto">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); 
                                        document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
