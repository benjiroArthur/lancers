<?php

namespace App\Http\Controllers;

use App\JobType;
use App\Project;
use App\JobOffered;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ClientDashController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'profile', 'address'])->except('getJobTypes');
    }

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
        $client = User::findOrFail($id)->userable;
        $progress = $client->jobOffered()->with('project')->where('status', 'in progress')->latest()->get();
        return response()->json($progress);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function yet($id) {
        $client = User::findOrFail($id)->userable;
        $yet = $client->jobOffered()->with('project')->where('status', 'not started')->latest()->get();
        return response()->json($yet);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function projects($id) {
        $client = User::findOrFail($id)->userable;
        $projects = $client->jobOffered;
        return response()->json($projects);
    }

    //get unapplied-for jobs
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function unappliedFor($id) {
        $client = User::findOrFail($id)->userable;
        $projects = Project::whereDoesntHave('projectApplication')->where('client_id', $client->id)->get();
        return response()->json($projects);
    }

    //get all job applications
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function jobApplication($id) {
        $client = User::find($id)->userable;
        $projects = $client->projectApplication()->where('status', null)->with('freelancer', 'project')->get()->groupBy('project_id');
        return response()->json($projects);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    // clients sees all projects personally posted...worked here
    public function clientProjects($id) {
        $client = User::find($id)->userable;
            $clientProjects = $client->projects()->latest()->get();
            return response()->json($clientProjects);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function projectPostProject(Request $request) {

        $this->validate($request, [
            'job_type_id' => 'required',
            'project_title' => 'required',
            'description' => 'required',
            'project_cost' => 'required',
            'duration' => 'required',
        ]);
        $project = new Project();
        $data = $request->all();
        $data['client_id'] = auth()->user()->userable->id;
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
      $project = Project::find($id);
      if($project->client_id === auth()-user()->userable->id){
          $project->delete();
          return response('success');
      }

          return response('unauthorised access');

    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // here is another delete function so choose which one makes sense lol
    public function getLatestProject() {
        $client = auth()->user()->userable;
        $project = $client->project()->latest()->limit(3)->get();
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJobTypes(){
        $jobType = JobType::all();
        return response()->json($jobType);
    }
}
