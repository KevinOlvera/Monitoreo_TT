@extends('admin.template.main')

@section('title', 'Registrate')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
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
          {!! Form::open(['route' => 'register', 'method' => 'POST']) !!}
            <div class="form-group">
              {!! Form::label('user', 'Boleta\RFC') !!}
              {!! Form::text('user', null, ['class' => 'form-control', 'required']) !!}
              <small class="text-muted">
                Ingresar tal como lo usa en el SAES.
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
               {!! Form::label('password_confirmation', "Confirma la contraseña", array('class' => 'control-label')) !!}
               {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
           </div>
            <div class="form-group">
              {!! Form::label('type', 'Tipo de usuario') !!}
              {!! Form::select('type', ['student' => 'Estudiante'],
                              null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group row justify-content-center">
              {!! Form::submit('Registrarse', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
