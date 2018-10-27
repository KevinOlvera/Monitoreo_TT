<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\User;
use App\Front;

class FrontController extends Controller
{
    public function index()
    {
      return view('front.index');
    }

    public function dashboard(Request $request)
    {
      $projects = \Auth::user()->projects()->paginate(10);
      //$projects = Project::search($request->id)->orderBy('id', 'ASC')->paginate(10);
      return view('admin.users.dashboard')->with('projects', $projects);
    }
}
