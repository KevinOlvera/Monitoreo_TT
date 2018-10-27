@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

  <div class="container">
    <nav class="navbar">
      <div class="container">
        <div class="col"></div>

        <ul class="navbar-nav mr-2">
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="btn btn-seccondary btn-sm">
              <i class="fa fa-user mr-2"></i> Usuarios
            </a>
          </li>
        </ul>

        <ul class="navbar-nav mr-4">
          <li class="nav-item">
            <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm">
              <i class="fa fa-plus mr-2"></i> Nuevo Proyecto
            </a>
          </li>
        </ul>

        {!! Form::open(['route' => 'projects.index', 'method' => 'GET', 'class' => 'form-inline ml-auto']) !!}
          <div class="form-group">
            {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Buscar Folio']) !!}
          </div>
          <button type="submit" class="btn btn-white btn-raised btn-fab btn-fab-mini btn-round">
              <i class="material-icons">search</i>
          </button>
        {!! Form::close() !!}
      </div>
    </nav>
  </div>

@endsection

@section('content')

  <div class="container">
    <div class="card">
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
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('¿Esta seguro de eliminar el proyecto?')" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      {!! $projects->render() !!}
    </div>
  </div>

@endsection
