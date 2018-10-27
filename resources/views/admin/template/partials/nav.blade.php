<nav class="navbar navbar-expand-lg bg-dark" color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="{{ route('front.index') }}">Monitoreo TT</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">

        <!-- Redes Sociales -->
        <!--<li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Follow us on Twitter">
            <i class="fa fa-twitter"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Like us on Facebook">
            <i class="fa fa-facebook-square"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="#" target="_blank" data-original-title="Follow us on Instagram">
            <i class="fa fa-instagram"></i>
          </a>
        </li>-->

        <!-- Links -->
        <li class="nav-item">
          <a class="nav-link" href="{{ route('front.index') }}">Inicio</a>
        </li>
        @guest
        @else
          <li class="nav-item">
            <a href="{{ route('admin.users.dashboard') }}" class="nav-link">
              Panel de Control
            </a>
          </li>
          <!-- Dropdown -->
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">{{ Auth::user()->name }} </a>
            <div class="dropdown-menu dropdown-with-icons">
              <div class="" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i> Cerrar Sesion</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
