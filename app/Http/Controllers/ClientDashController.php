<?php

namespace App\Http\Controllers;

use App\Project;
use App\JobOffered;
use Illuminate\Http\Request;


class ClientDashController extends Controller
{
    public function completed() {
        $completed = JobOffered::where('status', 'completed')->get();
        return response()->json($completed);
    }

    public function progress() {
        $progress = JobOffered::where('status', 'in-progress')->get();
        return response()->json($progress);
    }

    public function yet() {
        $yet = JobOffered::where('status', 'not-started')->get();
        return response()->json($yet);
    }

    public function projects() {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function projectPostProject(Request $request) {
        $project = new Project();
        $project->project_title = $request['project_title'];
        $project->description = $request['description'];
        $project->project_cost = $request['project_cost'];
        $project->duration = $request['duration'];
        $request->user()->role()->client()->project()->save($project);
        return redirect()->route('dashboard');



    }

}
