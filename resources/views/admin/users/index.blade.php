@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

  <div class="container">
    <nav class="navbar">
      <div class="container">
        <div class="col"></div>

        <ul class="navbar-nav mr-2">
          <li class="nav-item">
            <a href="{{ route('projects.index') }}" class="btn btn-seccondary btn-sm">
              <i class="fa fa-briefcase mr-2"></i> Proyectos
            </a>
          </li>
        </ul>

        <ul class="navbar-nav mr-4">
          <li class="nav-item">
            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
              <i class="fa fa-plus mr-2"></i> Nuevo Usuario
            </a>
          </li>
        </ul>

        {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline ml-auto']) !!}
          <div class="form-group">
            {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Buscar Boleta/RFC']) !!}
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
          <th>Boleta\RFC</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Tipo</th>
          <th>Accion</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <th class="align-middle">{{ $user->user }}</th>
              <td class="align-middle">{{ $user->name }}</td>
              <td class="align-middle">{{ $user->email }}</td>
              <td class="align-middle">
                @if ($user->type == 'admin')
                  <span class="badge badge-dark">{{ $user->type }}</span>
                @elseif ($user->type == 'director')
                  <span class="badge badge-info">{{ $user->type }}</span>
                @elseif ($user->type == 'synodal')
                  <span class="badge badge-primary">{{ $user->type }}</span>
                @elseif ($user->type == 'student')
                  <span class="badge badge-success">{{ $user->type }}</span>
                @endif
              </td>
              <td class="align-middle">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Esta seguro de eliminar el usuario?')" class="btn btn-danger btn-sm">
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
      {!! $users->render() !!}
    </div>
  </div>

@endsection
