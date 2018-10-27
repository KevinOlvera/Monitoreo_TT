@extends('templates.main')

@section('title', 'Lista de Deportes')

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col">
              {!! $materials->render() !!}
            </div>
            <div class="col-sm-2 mb-3">
              <a href="{{ route('materials.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Nuevo Material</a>
            </div>
            <!--Buscador de Usuarios-->
            <div class="col-sm-3">
              {!! Form::open(['route' => 'materials.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
                <div class="input-group">
                  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar Deporte', 'aria-describedby' => 'search']) !!}
                  <div class="input-group-append">
                    <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                  </div>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
          <table class="table table-striped text-center table-hover">
            <thead>
              <th>Id</th>
              <th>Deporte</th>
              <th>Estado</th>
              <th>Accion</th>
            </thead>
            <tbody>
              @foreach ($materials as $material)
                <tr>
                  <th class="align-middle">{{ $material->id }}</th>
                  <td class="align-middle">{{ $material->name }}</td>
                  <td class="align-middle">{{ $material->state }}</td>
                  <td class="align-middle">
                    <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                    <a href="{{ route('admin.materials.destroy', $material->id) }}" onclick="return confirm('¿Esta seguro de eliminar el Deporte?')" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
