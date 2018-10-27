@extends('admin.template.main')

@section('title', 'Ingresa')

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
          {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
            <div class="form-group">
              {!! Form::label('email', 'Correo Electronico') !!}
              {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
              {!! Form::label('password', 'Contraseña') !!}
              {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group form-inline">
              {{ Form::checkbox('remember', null, null, ['class' => 'form-control']) }}&nbsp;
              {!! Form::label('remember', 'Recuerdame') !!}
            </div>
            <div class="form-group row justify-content-center">
              {!! Form::submit('Ingresar', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
