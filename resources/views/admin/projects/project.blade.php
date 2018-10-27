@extends('admin.template.main')

@section('title', 'Panel de Control')

@section('header')

  <div class="container">
    <nav class="navbar">
      <div class="container">
        <div class="col">
          {!! Form::open(['route' => ['admin.projects.schedule', $project->id], 'method' => 'POST']) !!}
            <div class="form-group" style="margin-bottom: 0;">
              {{ Form::text('date', null, ['class' => 'form-control datetimepicker', 'placeholder' => 'Agenda una Cita']) }}
            </div>
            <button type="submit" class="btn btn-fab btn-round btn-info">
              <i class="material-icons">access_alarm</i>
            </button>
          {!! Form::close() !!}
        </div>

        @if( Auth::user()->admin() )
          <ul class="navbar-nav mr-2">
            <li class="nav-item">
              <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">
                <i class="fa fa-edit mr-2"></i>Editar
              </a>
            </li>
          </ul>

          <ul class="navbar-nav mr-4">
            <li class="nav-item">
              <a href="{{ route('admin.projects.destroy', $project->id) }}" onclick="return confirm('¿Esta seguro de eliminar el proyecto?')" class="btn btn-danger btn-sm">
                <i class="fa fa-trash mr-2"></i>Eliminar
              </a>
            </li>
          </ul>
        @endif

        {!! Form::open(['route' => ['admin.projects.upload', $project->id], 'method' => 'POST', 'files' => true]) !!}
          <div class="form-group form-file-upload form-file-simple" style="margin-bottom: 0;">
            <input name="file" id="file" type="file" class="inputFileHidden" onchange="i_file.value = this.value">
            <div class="input-group">
              <input name="i_file" id="i_file" type="text" class="form-control inputFileVisible" placeholder="Solo un archivo">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-fab btn-round btn-black">
                    <i class="material-icons">attach_file</i>
                </button>
              </span>
            </div>
          </div>
        {!! Form::close() !!}
      </div>
    </nav>
  </div>

@endsection

@section('content')

  <div class="container">

    <div class="card">
      <h3 class="text-center mt-3"><span class="icon icon-info">{{ $project->title }}</span></h3 class="text-center">

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
    </div>

     <div class="row">
       @foreach ($files as $file)
        <div class="col-sm-2">
          <div class="card">
            <div class="card-body text-center">
              <h5 id="text-file" class="card-title">{{ $file->name }}</h5>
              <p class="card-text"><i class="fa fa-file" style="font-size: 5em;"></i></p>
              <h6>{{ $file->created_at->diffForHumans() }}</h6>
              <div class="row justify-content-center">
                <a href="{{ route('admin.projects.download', $file->id) }}" class="btn btn-sm btn-primary">
                  Descargar
                </a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row">
      @foreach ($dates as $date)
       <div class="col-sm-3">
         <div class="card">
           <div class="card-body text-center">
             @if ( $date->date < $carbon )
               <div class="card-header card-header-danger">
                 Cita Pasada
               </div>
             @else
               <div class="card-header card-header-info">
                 Proxima Cita
               </div>
             @endif
             <h5 id="text-file" class="card-title">{{ $date->date }}</h5>
             <p class="card-text"><i class="fa fa-calendar" style="font-size: 5em;"></i></p>
             <h6>{{ $date->created_at->diffForHumans() }}</h6>
             <div class="row justify-content-center">
               @if( Auth::user()->synodal() )
                 <a href="{{ route('admin.projects.date.remove', [$project->slug, $date->id]) }}" class="btn btn-sm btn-danger mr-2">
                   Eliminar
                 </a>
                 @if ($date->state == 0)
                   <a href="{{ route('admin.projects.date.approve', [$project->slug, $date->id]) }}" class="btn btn-sm btn-success">
                     Aprobar
                   </a>
                 @endif
               @endif
               @if ($date->state != 0)
                 <button type="button" class="btn btn-sm btn-info" disable>
                   Agendada
                 </button>
               @endif
               @if( Auth::user()->student() )
                 @if ($date->state == 0)
                   <a href="{{ route('admin.projects.date.remove', [$project->slug, $date->id]) }}" class="btn btn-sm btn-danger mr-2">
                     Eliminar
                   </a>
                   <button type="button" class="btn btn-sm btn-warning" disable>
                     Espera...
                   </button>
                 @endif
               @endif
             </div>
           </div>
         </div>
       </div>
     @endforeach
   </div>

  </div>

@endsection

@section('js')

  <script>
    <!-- javascript for init -->
    $('.datetimepicker').datetimepicker({
      icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-chevron-up",
        down: "fa fa-chevron-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
        today: 'fa fa-screenshot',
        clear: 'fa fa-trash',
        close: 'fa fa-remove'
      }
    });

    $("#i_file").click(function() {
      $("#file").click();
    });

  </script>

@endsection
