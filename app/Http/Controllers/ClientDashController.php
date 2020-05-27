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

        $this->validate($request, [
            'job_id' => 'required',
            'project_title' => 'required',
            'description' => 'required',
            'project_cost' => 'required',
            'duration' => 'required',
        ]);
        $project = new Project();
        $data = $request->all();
        $data['client_id'] = auth()->user()->userable->id;
        /*
         * when the above line is not needed
         * or we don't need to add extra info to the request coming from the user
         *
         * ignore the $data and just do this:
         * $project = new Project();
         * $project = $project->create($request->all());
         * */
        $project = $project->create($data);

        return response()->json($project);

    }

}
