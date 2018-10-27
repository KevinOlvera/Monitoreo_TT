@extends('admin.template.main')

@section('title', $project->title)

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-5 mb-3">
              {{-- <input type="file" name="file" id="file" class="inputfile inputfile-1" hidden/>
              <label for="file"><i class="fas fa-upload mr-2"></i><span>Choose a file</span></label> --}}
              {!! Form::open(['route' => ['admin.projects.upload', $project->id], 'method' => 'POST', 'files' => true]) !!}
                {!! Form::file('file', ['class' => '']) !!}
                {!! Form::submit('&#xf052;', ['class' => 'fa btn btn-dark']) !!}
              {!! Form::close() !!}
            </div>
            <div class="col-sm-4">
              {!! Form::open(['route' => ['admin.projects.upload', $project->id], 'method' => 'POST', 'files' => true]) !!}
                {!! Form::date('name', \Carbon\Carbon::now()) !!}
                {!! Form::submit('Agendar Cita', ['class' => 'btn btn-sm btn-dark']) !!}
              {!! Form::close() !!}
            </div>
            @if ( Auth::user()->admin() || Auth::user()->synodal() )
              <div class="col mb-3">
                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                  <i class="fas fa-user-edit mr-2"></i>Editar
                </a>
              </div>
              @if ( Auth::user()->admin() )
                <div class="col">
                  <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('¿Esta seguro de eliminar el proyecto?')" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash mr-2"></i>Eliminar
                  </a>
                </div>
              @endif
            @endif
          </div>
          <table class="table table-striped text-center table-hover">
            <thead>
              <th>Boleta\RFC</th>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Tipo</th>
            </thead>
            <tbody>
              @foreach ($users as $user)
                @if ($user->type != 'admin')
                  <tr>
                    <th>{{ $user->user }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if ($user->type == 'student')
                        <span class="badge badge-success">student</span>
                      @elseif ($user->type == 'synodal')
                        <span class="badge badge-warning">synodal</span>
                      @endif
                    </td>
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>

          <hr>

          <div class="row">
            @foreach ($files as $file)
              <div class="col-sm-3">
                <div class="card-body text-center">
                  <h5 id="text-file" class="card-title">{{ $file->name }}</h5>
                  <p class="card-text"><i class="fas fa-file-pdf" style="font-size: 5em;"></i></p>
                  <h6>{{ $file->created_at->diffForHumans() }}</h6>
                  <a href="{{ route('admin.projects.download', $file->id) }}" class="btn btn-sm btn-secondary">
                    Descargar
                  </a>
                </div>
              </div>
            @endforeach
          </div>

          <hr>

        </div>
      </div>
    </div>
  </div>
@endsection
