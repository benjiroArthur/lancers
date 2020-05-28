<?php

namespace App\Http\Controllers;

use App\Project;
use App\JobOffered;
use App\User;
use http\Client;
use Illuminate\Http\Request;


class ClientDashController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function completed($id) {
        $client = User::findOrFail($id)->userable;
        $completed = $client->projects->whereHas('job_offered', function ($q){
            $q->where('status', 'completed');
        });
        return response()->json($completed);
    }

    public function progress($id) {
        $client = User::findorFail($id)->userable;
        $progress = $client->projects->whereHas('job_offered', function ($c) {
            $c->where('status', 'in-progress');
        });
        return response()->json($progress);
    }

    public function yet($id) {
        $client = User::findorFail($id)->userable;
        $yet = $client->projects->whereHas('job_offered', function ($y){
            $y->where('status', 'not-completed');
        });
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
