@extends('admin.template.main')

@section('title', 'Editar usuario - '. $user->name)

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['route' => ['users.update', $user, $user->id], 'method' => 'PUT']) !!}
            <div class="form-group">
              {!! Form::label('user', 'Matricula') !!}
              {!! Form::text('user', $user->user, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('name', 'Nombre') !!}
              {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('email', 'Correo Electronico') !!}
              {!! Form::email('email', $user->email, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('type', 'Tipo de usuario') !!}
              {!! Form::select('type', ['student' => 'Estudiante',
                                        'synodal' => 'Sinodal',
                                        'director' => "Directivo",
                                        'admin' => 'Administrador'],
                              $user->type, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group row justify-content-center">
              {!! Form::submit('Editar', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
