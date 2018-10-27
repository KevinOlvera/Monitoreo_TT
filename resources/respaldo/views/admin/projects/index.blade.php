@extends('admin.template.main')

@section('title', 'Lista de Proyectos')

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col">
              {!! $projects->render() !!}
            </div>
            <div class="col-sm-2 mb-3">
              <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Nuevo Proyecto</a>
            </div>
            <!--Buscador de Usuarios-->
            <div class="col-sm-3">
              {!! Form::open(['route' => 'projects.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
                <div class="input-group">
                  {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Buscar Folio', 'aria-describedby' => 'search']) !!}
                  <div class="input-group-append">
                    <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                  </div>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
          <table class="table table-striped text-center table-hover">
            <thead>
              <th>Folio</th>
              <th>Titulo</th>
              <th>Calificacion</th>
              <th>Materia</th>
              <th>Accion</th>
            </thead>
            <tbody>
              @foreach ($projects as $project)
                <tr>
                  <th class="align-middle">{{ $project->id }}</th>
                  <td><a href="{{ route('admin.projects.project', $project->slug) }}" class="btn btn-link">{{ $project->title }}</a></td>
                  <td class="align-middle">{{ $project->score }}</td>
                  <td class="align-middle">
                    @if ($project->type == '1')
                      <span class="badge badge-success">TT1</span>
                    @elseif ($project->type == '2')
                      <span class="badge badge-warning">TT2</span>
                    @elseif ($project->type == '3')
                      <span class="badge badge-danger">TTR</span>
                    @endif
                  </td>
                  <td class="align-middle">
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                    <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('¿Esta seguro de eliminar el proyecto?')" class="btn btn-danger btn-sm">
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
