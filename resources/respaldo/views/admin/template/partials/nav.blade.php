<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #004358;">
<div class="container">
  <a class="navbar-brand" href="/">Seguimiento TT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto"> {{-- text-uppercase --}}
      @guest
        <li class="nav-item">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Conocenos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Acerca de</a>
        </li>
        <li><a class="nav-link" href="{{ route('register') }}">Registrate</a></li>
        <li><a class="nav-link" href="{{ route('login') }}">Ingresa</a></li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('projects.index') }}">Proyectos <span class="sr-only">(current)</span></a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.users.dashboard') }}">Panel de Control <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Cerrar Sesion</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</div>
</nav>
