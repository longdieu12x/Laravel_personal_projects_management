<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    //
    public function index(){
        $project = Project::first();
        return view('welcome')
                        ->with('user',Auth::user())
                        ->with('code_posts', $project->code)
                        ->with('project', $project);
    }
}
