@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="card col-sm-8">
        <h3 class="text-center mt-5">Nuevo Proyecto</h3 class="text-center">

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
            {!! Form::open(['route' => 'projects.store', 'method' => 'POST', 'files' => true]) !!}
              <div class="form-group">
                {!! Form::label('title', 'Titulo del proyecto') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
              </div>
              {{-- <div class="form-group">
                {!! Form::label('file', 'Archivo') !!}
                {!! Form::file('file') !!}
              </div> --}}
              <div class="form-group">
                {!! Form::label('type', 'Materia') !!}
                {!! Form::select('type', ['1' => 'TT1',
                                          '2' => 'TT2',
                                          '3' => "TTR"],
                                null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('users', 'Alumnos') !!}
                {!! Form::select('users[]', $users, null, ['class' => 'form-control chosen-select', 'multiple']) !!}
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

@section('js')
  <script>
    $('.chosen-select').chosen({
      placeholder_text_multiple: 'Seleccione los alumnos y sinodales',
      max_selected_options: 9,
      no_results_text: 'El usuario que busca no existe. :('
    });
  </script>
@endsection