@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-sm-8">
        <h3 class="text-center mt-5">Nuevo Usuario</h3 class="text-center">

        @if (count($errors) > 0)
          <div class="alert alert-danger" role="alert">
            <ul style="margin-bottom: 0px;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="row justify-content-center">
          <div class="col-sm-10">
            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
              <div class="form-group">
                {!! Form::label('user', 'Boleta\RFC') !!}
                {!! Form::text('user', null, ['class' => 'form-control', 'required']) !!}
                <small class="text-muted">
                  Ingresar tal como en el SAES.
                </small>
              </div>
              <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                <small class="text-muted">
                  Ingresar su nombre iniciando por appellidos.
                </small>
              </div>
              <div class="form-group">
                {!! Form::label('email', 'Correo Electronico') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('password', 'Contraseña') !!}
                {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
                <small class="text-muted">
                  Debe contener de 10 a 30 caracteres de largo.
                </small>
              </div>
              <div class="form-group">
                {!! Form::label('type', 'Tipo de usuario') !!}
                {!! Form::select('type', ['student' => 'Estudiante',
                                          'synodal' => 'Sinodal',
                                          'director' => "Directivo",
                                          'admin' => 'Administrador'],
                                null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group row justify-content-center">
                {!! Form::submit('Registrar', ['class' => 'btn btn-info']) !!}
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

