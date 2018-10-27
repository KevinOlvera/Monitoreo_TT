<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>@yield('title', 'Inicio')</title>
    <!-- Importar Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/bootstrap_4.1/css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/MDB/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/MDB/css/mdb.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome_5.0.13/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen_1.8.5/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css?family=Passion+One|Raleway" rel="stylesheet">
  </head>
  <body>
    @include('admin.template.partials.nav')

    <section class="container">
      <div class="row justify-content-center mt-4 mb-3">
        <h2 class="text-uppercase">@yield('title', '')</h2>
      </div>
      @include('flash::message')
      @yield('content')
    </section>

    <script src="{{ asset('plugins/jquery_3.3.1/js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('plugins/bootstrap_4.1/js/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('plugins/MDB/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/MDB/js/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/MDB/js/mdb.js') }}"></script>
    <script src="{{ asset('plugins/chosen_1.8.5/chosen.jquery.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @yield('js')
  </body>
</html>
