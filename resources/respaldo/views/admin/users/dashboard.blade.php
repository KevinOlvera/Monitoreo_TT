@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            @if( Auth::user()->admin() )
              <div class="col">
                {!! $projects->render() !!}
              </div>
              <div class="col-sm-2">
                <a href="{{ route('users.index') }}" class="btn btn-info"><i class="fas fa-user mr-2"></i>Usuarios</a>
              </div>
              <div class="col-sm-2">
                <a href="{{ route('projects.index') }}" class="btn btn-dark"><i class="fas fa-briefcase mr-2"></i>Proyectos</a>
              </div>
              <div class="col-sm-2 mb-3">
                <a href="{{ route('projects.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Nuevo Proyecto</a>
              </div>
            @endif
            @if( Auth::user()->admin() || Auth::user()->synodal() )
              <!--Buscador de Usuarios-->
              @if( Auth::user()->synodal() )
                <div class="col"></div>
              @endif
              <div class="col-sm-3 mb-3">
                {!! Form::open(['route' => 'admin.users.dashboard', 'method' => 'GET', 'class' => 'form-inline']) !!}
                  <div class="input-group">
                    {!! Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Buscar Folio', 'aria-describedby' => 'search']) !!}
                    <div class="input-group-append">
                      <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
            @endif
          </div>
          <table class="table table-striped text-center table-hover">
            <thead>
              <th>Folio</th>
              <th>Titulo</th>
              <th>Calificacion</th>
              <th>Materia</th>
              @if( Auth::user()->admin() )
                <th>Acción</th>
              @endif
              @if ( Auth::user()->synodal() )
                <th>Calificar</th>
              @endif
            </thead>
            <tbody>
              @foreach ($projects as $project)
                <tr>
                  <th class="align-middle">{{ $project->id }}</td>
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
                  @if( Auth::user()->admin() )
                    <td class="align-middle">
                      <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                      <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('¿Esta seguro de eliminar el proyecto?')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      </a>
                    </td>
                  @endif
                  @if( Auth::user()->synodal() )
                    <td class="row justify-content-center">
                      {!! Form::open(['route' => ['admin.projects.qualify', $project->id], 'method' => 'POST', 'class' => 'form-inline qualify']) !!}
                        <div class="input-group">
                          {!! Form::number('score', null, ['class' => 'form-control', 'min' => 0, 'max' => 10, 'aria-describedby' => 'search']) !!}
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-book-open"></i></span>
                          </div>
                        </div>
                      {!! Form::close() !!}
                      {{-- <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a> --}}
                    </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
