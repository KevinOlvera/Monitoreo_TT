<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Project;
use App\User;
use App\File;
use App\Date;
use Carbon\Carbon;


class ProjectsController extends Controller
{
  //Colocamos en español a Carbon
  public function __construct()
  {
    Carbon::setLocale('es');
  }

  public function index(Request $request)
  {
    $projects = Project::search($request->id)->orderBy('id', 'ASC')->paginate(10);
    return view('admin.projects.index')->with('projects', $projects);
  }

  public function create()
  {
    $users = User::where('type', '=', 'student')->orWhere('type', '=', 'synodal')->orderBy('user', 'ASC')->pluck('user', 'id');
    return view('admin.projects.create')->with('users', $users);
  }

  public function store(Request $request)
  {
    $lista = $request->users;
    $lista = array_add($lista, 10, strval(\Auth::user()->id));

    $project = new Project($request->all());
    $project->save();

    //Rellenar tabla pivote project_user
    $project->users()->sync($lista);

    flash('Se ha registrado el proyecto '. $project->title .' correctamente')->success()->important();
    return redirect()->route('projects.index');
  }

  public function project($slug)
  {
    $project = Project::where('slug', $slug)->firstOrFail();
    $users = $project->users;
    $files = $project->files;
    $dates = $project->dates;
    $carbon = \Carbon\Carbon::now();
    $carbon->format('mm/dd/yy H:i');
    $carbon->setTimezone('GMT');
    //dd($project->files);

    $info = \Auth::user()->projects->where('id', '=', $project->id)->isEmpty();
    if($info) {
      return redirect()->route('admin.users.dashboard');
    }else {
      return view('admin.projects.project')->with('project', $project)->with('users', $users)->with('files', $files)->with('dates', $dates)->with('carbon', $carbon);
    }
  }

  public function edit($id)
  {
    $users = User::where('type', '=', 'student')->orWhere('type', '=', 'synodal')->orderBy('user', 'ASC')->pluck('user', 'id');
    $project = Project::find($id);
    $my_users = $project->users->pluck('id', 'user')->toArray();
    return view('admin.projects.edit')->with('project', $project)->with('users', $users)->with('my_users', $my_users);
  }

  public function update(Request $request, $id)
  {
    $project = Project::find($id);
    $lista = $request->users;
    $lista = array_add($lista, 10, strval(\Auth::user()->id));
    $project->fill($request->all());
    $project->save();

    //Rellenar tabla pivote project_user
    $project->users()->sync($lista);

    flash('Se ha editado al proyecto '. $project->title .' correctamente')->warning()->important();
    return redirect()->route('projects.index');
  }

  public function destroy($id)
  {
    $project = Project::find($id);
    //$project->users()->detach(1);
    $users = $project->users->pluck('id')->toArray();
    foreach ($users as $user) {
      $project->users()->detach($user);
    }
    $project->delete();
    flash('Se ha eliminado el proyecto '. $project->title .' correctamente')->warning()->important();
    return redirect()->route('projects.index');
  }

  public function upload(Request $request, $id)
  {
    $project = Project::find($id);
    //Manipulacion de Archivos
    // dd($request->file);
    if ($request->file('file')) {
      $file = $request->file('file');
      $name = $file->getClientOriginalName();
      $f_name = 'STT_' . str_replace(' ', '_', $project->title) . '_' . time() . '.' . $file->getClientOriginalExtension();
      $path = public_path() . '/files/projects/';
      $file->move($path, $f_name);
      $file = new File();
      $file->name = $name;
      $file->f_name = $f_name;
      //Se asigna asi el ID ya que pueden crearce mas proyectos al mismo tiempo.
      $file->project()->associate($project);
      $file->save();
      flash('Se ha subido el archivo correctamente')->success()->important();
    }

    return redirect('admin/view/'.$project->slug);
  }

  public function downloadFile($id)
  {
    $file = File::find($id);
    $path = public_path() . '/files/projects/' . $file->f_name;
    return response()->download($path);
  }

  public function qualify(Request $request, $id)
  {
    $project = Project::find($id);
    // dd($project->score);
    $project->score = $request->score;
    $project->save();
    // dd($project->score);
    flash('Se califico el proyecto '. $project->title .' correctamente')->success()->important();
    return redirect()->route('admin.users.dashboard');
  }

  public function schedule(Request $request, $id)
  {
    $project = Project::find($id);
    //Manipulacion de Archivos
    if ($request->isEmpty == 0) {
      $carbon = new Carbon($request->date);
      $carbon->format('mm/dd/yy H:i');
      $carbon->setTimezone('GMT');
      $date = new Date();
      $date->state = 0;
      $date->name = $project->title;
      $date->date = $carbon;
      $date->project()->associate($project);
      $date->save();

      flash('Se ha agendado la cita, espera a que sea aprobada.')->warning()->important();
    }

    return redirect('admin/view/'.$project->slug);
  }

  public function approve($slug, $id)
  {
    $date = Date::find($id);
    // dd($project->score);
    $date->state = 1;
    $date->save();
    // dd($project->score);
    flash('Se aprovo la cita correctamente.')->success()->important();
    return redirect('admin/view/'.$slug);
  }

  public function remove($slug, $id)
  {
    $date = Date::find($id);
    // dd($project->score);
    $date->delete();
    // dd($project->score);
    flash('Se ha eliminado la cita correctamente.')->warning()->important();
    return redirect('admin/view/'.$slug);
  }
}
