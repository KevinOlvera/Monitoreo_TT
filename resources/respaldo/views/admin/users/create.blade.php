@extends('admin.template.main')

@section('title', 'Crear Usuario')

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
              <ul style="margin-bottom: 0px;">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

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
              {!! Form::submit('Registrar', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
