<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index(Request $request)
    {
      $users = User::search($request->user)->orderBy('user', 'ASC')->paginate(10);
      return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
      return view('admin.users.create');
    }

    public function store(Request $request)
    {
      $user = new User($request->all());
      // //dd($request->type);
      $user->type = $request->type;
      $user->password = bcrypt($request->password);
      $user->save();

      flash('Se ha registrado el usuario '. $user->name .' correctamente')->success()->important();

      return redirect()->route('users.index');
    }

    public function show($id)
    {
      // code...
    }

    public function edit($id)
    {
      $user = User::find($id);
      return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      $user->fill($request->all());
      $user->type = $request->type;
      $user->save();
      flash('Se ha editado al usuario '. $user->name .' correctamente')->warning()->important();
      return redirect()->route('users.index');
    }

    public function destroy($id)
    {
      $user = User::find($id);
      $projects = $user->projects->pluck('id')->toArray();
      foreach ($projects as $project) {
        $user->projects()->detach($project);
      }
      $user->delete();

      flash('Se ha eliminado el usuario '. $user->name .' correctamente')->warning()->important();
      return redirect()->route('users.index');
    }

    public function dashboard(Request $request)
    {
      $projects = \Auth::user()->projects()->paginate(10);
      //$projects = Project::search($request->id)->orderBy('id', 'ASC')->paginate(10);
      return view('admin.users.dashboard')->with('projects', $projects);
    }
}
