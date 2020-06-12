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
use Illuminate\Support\Facades\Storage;


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

        $completed = $client->jobOffered()->where('job_offereds.status', 'completed')->latest()->with('project')->get();
        return response()->json($completed);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function progress($id) {
        $client = User::findOrFail($id)->userable;
        $progress = $client->jobOffered()->with('project')->where('job_offereds.status', 'in progress')->latest()->get();
        return response()->json($progress);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function yet($id) {
        $client = User::findOrFail($id)->userable;
        $yet = $client->jobOffered()->where('job_offereds.status', 'pending')->latest()->with('project')->get();
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
    /**
     * @param $request
     * @return \Illuminate\Http\Response
     * */
    public function awardJob(Request $request) {
        $proAward = JobOffered::where('project_id', $request->project_id)->first();
        if($proAward === null){
            $data = $request->all();
            $data['status'] = 'pending';
            JobOffered::create($data);
        }
        else{
            $proAward->update([
                'freelancer_id' => $request->freelancer_id,
                'status' => 'pending'
            ]);
        }
        $project = Project::find($request->project_id);
        $project->update([
            'status' => 'awarded'
        ]);
        return response('success');
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function awaitingPaymentProjects() {
        $client = auth()->user()->userable;
        $clientProjects = $client->projects()->where('status', 'accepted')->get();
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
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addProjectFiles(Request $request) {

        $this->validate($request, [
            'file' => 'required|mimes:zip,rar'
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            Storage::disk('project-files')->putFile($fileName, $file);
            $project = Project::find($request->project_id);
            $project->projectFiles()->create([
                'name' => $fileName,
            ]);
            return response('success');
        }


        return response('No file selected');

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
