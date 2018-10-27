@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-sm-8">
        <h3 class="text-center mt-5">Editar - <span class="icon icon-danger">{{ $user->name }}</span></h3 class="text-center">

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
                {!! Form::submit('Editar', ['class' => 'btn btn-info']) !!}
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

