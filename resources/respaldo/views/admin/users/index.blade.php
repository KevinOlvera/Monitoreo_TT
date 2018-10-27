@extends('admin.template.main')

@section('title', 'Lista de Usuarios')

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col">
              {!! $users->render() !!}
            </div>
            <div class="col-sm-2 mb-3">
              <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Nuevo Usuario</a>
            </div>
            <!--Buscador de Usuarios-->
            <div class="col-sm-3">
              {!! Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
                <div class="input-group">
                  {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Buscar Boleta\RFC', 'aria-describedby' => 'search']) !!}
                  <div class="input-group-append">
                    <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                  </div>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
          {{-- <div class="col-sm-3">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Buscar Boleta\RFC">
              <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
            </form>
          </div> --}}
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
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></a>
                    <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Esta seguro de eliminar el usuario?')" class="btn btn-danger btn-sm">
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
