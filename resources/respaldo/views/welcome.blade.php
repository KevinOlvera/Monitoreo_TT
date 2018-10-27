@extends('admin.template.main')



@section('content')
  @guest
    <h1>¡Seguir tu Proyecto Terminal, nunca habia sido tan sencillo!</h1>
    <p>Olvidate de perseguir a tu profesor</p>
    <p>Olvidate que te falto un documento o no te avisaron</p>
    <p>Porque sabemos que tu tiempo es oro y por eso lo optimizamos.</p>
    <a href="#" class="btn btn-info">Leer mas...</a>
  @else
    <h1>Bienvenido {{ Auth::user()->name }}</h1>
  @endguest
@endsection
