@extends('templates.main')

@section('title', 'Agregar Color')

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
          {!! Form::open(['route' => 'colors.store', 'method' => 'POST']) !!}
            <div class="form-group">
              {!! Form::label('name', 'Color') !!}
              {!! Form::color('name', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group row justify-content-center">
              {!! Form::submit('Agregar', ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection
