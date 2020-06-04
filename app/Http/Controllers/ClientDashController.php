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
        $completed = $client->jobOffered()->with('project')->where('status', 'completed')->latest()->get();
        return response()->json($completed);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function progress($id) {
        $client = User::findorFail($id)->userable;
        $progress = $client->jobOffered()->with('project')->where('status', 'in progress')->latest()->get();
        return response()->json($progress);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function yet($id) {
        $client = User::findorFail($id)->userable;
        $yet = $client->jobOffered()->with('project')->where('status', 'not started')->latest()->get();
        return response()->json($yet);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function projects($id) {
        $client = User::findorFail($id)->userable;
        $projects = $client->jobOffered;
        return response()->json($projects);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    // clients sees all projects personally posted...worked here
    public function clientProjects($id, $user) {
        $client = User::findorFail($id)->userable;
        if($user->role_id === $client->id) {
            $clientprojects = $client->projects;
        }
        return response()->json($clientprojects);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // this is where delete of project happens
    public function deleteProjects($id) {
        DB:delete('delete from projects where id = ?', [$id]);

        return redirect('/client/projects')->with('Success', 'Project Deleted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // here is another delete function so choose which one makes sense lol
    public function delete_projects($id) {

        if(auth()->user()->role->name === 'client') {

            DB::table('projects')->where('id', $id)->delete();

            return redirect('/client/projects')->with('Success', 'Project Deleted');
        }

    }
}
