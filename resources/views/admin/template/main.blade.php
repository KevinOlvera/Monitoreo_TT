<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>@yield('title', 'Inicio')</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('plugins/materialkit/css/material-kit.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/chosen_1.8.5/chosen.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

</head>

<body class="landing-page sidebar-collapse">
  @include('admin.template.partials.nav')

  <div class="container">
    @include('flash::message')
  </div>

  @yield('header')

  @yield('content')

  @include('admin.template.partials.footer')


  <script src="{{ asset('plugins/jquery_3.3.1/js/jquery.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/core/bootstrap-material-design.min.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/plugins/moment.min.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/plugins/bootstrap-datetimepicker.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/plugins/nouislider.min.js') }}"></script>
  <script src="{{ asset('plugins/materialkit/js/material-kit.js') }}"></script>
  <script src="{{ asset('plugins/chosen_1.8.5/chosen.jquery.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  @yield('js')

</body>

</html>
