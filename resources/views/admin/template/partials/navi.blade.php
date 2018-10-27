<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
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
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">Conocenos</a>
        </li> --}}
        <li class="nav-item">
          <a target="_blank" class="nav-link" href="https://onedrive.live.com/?authkey=%21ALDL0fmQO7NsrZg&cid=1364ED6D17FA0B3F&id=1364ED6D17FA0B3F%21106337&parId=1364ED6D17FA0B3F%2185978&o=OneUp">Documentacion</a>
        </li>
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Ingresa</a>
          </li>
        @else
          <!-- Dropdown -->
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">{{ Auth::user()->name }} </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="{{ route('admin.users.dashboard') }}" class="dropdown-item">
                <i class="material-icons">content_paste</i> Panel de Control
              </a>
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
