<?php

namespace App\Http\Controllers;

use App\JobType;
use App\Project;
use App\JobOffered;
use App\ProjectApplication;
use App\User;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class ClientDashController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except('getJobTypes');
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
        $project = Project::find($id);
       // $projects = $client->projectApplication()->with('freelancer', 'project')->get()->groupBy('project_id');
       $projects = $project->projectApplication()->where('status', 'applied')->with('freelancer', 'project')->get();
        return response()->json($projects);
    }



     // award job to freelancer
    public function awardJob(Request $request, $id) {
        $client = User::find($id)->userable;
        if($client->projectApplication()-where('status', 'accepted')->with('freelancer', 'project')) {
            // i dont know how to go about it anymore.Finish it please
        }
        else {

        }

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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function appliedProjects($id) {
        $client = User::find($id)->userable;
            $clientProjects = $client->projects()->whereHas('projectApplication')->where('status', 'applied')->get();
            return response()->json($clientProjects);
    }

    /**
     *
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
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
     *
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addProjectFiles(Request $request, $id) {

        $this->validate($request, [
            'file' => 'required|mimes:zip,rar'
        ]);
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $project = Project::find($id);


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
        $project = $client->projects()->latest()->limit(3)->get();
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

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getInvoiceDetails($id){
        $invoice = JobOffered::where('project_id', $id)->with('freelancer', 'project')->first();
        return response()->json($invoice);

    }

    public function acceptJob(Request $request) {
        $user = auth()->user();
        $project = Project::find($request->project_id);
        $project->update('status', 'accepted');

        return response('success');

    }
}
