@extends('front.template.mainl')

@section('title', 'Ingresa')

@section('header')

@endsection

@section('content')

<div class="page-header header-filter" filter-color="purple" style="background-image: url('files/img/office-documents.jpg')">
  

  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-sm-8">
        <h3 class="text-center mt-5">Ingresa</h3 class="text-center">


        <div class="row justify-content-center">
          <div class="col-sm-10">

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
              <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    {{ Form::checkbox('remember', null, null, ['class' => 'form-check-input']) }}&nbsp;
                    Recuerdame
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="form-group row justify-content-center">
                {!! Form::submit('Ingresar', ['class' => 'btn btn-primary', 'value' => '']) !!}
              </div>
            {!! Form::close() !!}
          
          </div>
        </div>
      
      </div>
    </div>
  </div>

</div>

@endsection

