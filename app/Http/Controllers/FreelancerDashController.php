<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Client;
use App\Events\ProjectUpdateEvent;
use App\Friend;
use App\JobOffered;
use App\ProjectApplication;
use App\Project;
use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreelancerDashController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified',]);
    }
    // lists all completed projects
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function completed($id) {
        $freelance = User::findOrFail($id)->userable;
        $completed = $freelance->jobOffered()->where('job_offereds.status', 'completed')->with('project')->latest()->get();

        return response()->json($completed);
    }

    // lists all projects in progress
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function progress($id) {
        $freelance = User::findOrFail($id)->userable;
        $progress = $freelance->jobOffered()->where('job_offereds.status', 'in progress')->with('project')->latest()->get();

        return response()->json($progress);
    }

    // lists projects yet to start
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function yet($id) {
        $freelance = User::findOrFail($id)->userable;
        $yet = $freelance->jobOffered()->where('job_offereds.status', 'not started')->with('project')->latest()->get();

        return response()->json($yet);
    }

    // lists all projects either in progress, yet to start or completed
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function all($id) {
        $freelance = auth()->user()->userable;
        $projects = $freelance->jobOffered()->with('project')->latest()->get();

        return response()->json($projects);
    }

    // lists all projects either in progress, yet to start or completed
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function recentProject($id) {
        $freelance = User::findOrFail($id)->userable;
        //$projects = $freelance->jobOffered()->with('project')->latest()->limit(3)->get();
        $projects = Project::whereDoesntHave('jobOffered')->latest()->limit(3)->get();
        return response()->json($projects);
    }


    // I have commented the approved jobs out since we are not going to use it anymore
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    // freelancers see only approved jobs...worked here
    /**
    public function approvedJobs($id) {
        $freelance = User::findorFail($id)->userable;
        $approvedjobs = $freelance->projects()->where('approved', 1)->get();
        return response()->json($approvedjobs);
    }
     *
     * /

    /**
     *
     *
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function applyForJobs($id) {
        $user = auth()->user();
        if($user->role->name === 'freelancer'){
            if($user->profile_updated === true){
                $jobApp = ProjectApplication::where('project_id', $id)->where('freelancer_id', $user->userable->id)->first();

                if($jobApp === null){
                    $jobApplication = new ProjectApplication();
                    $data = [
                        'project_id' => $id,
                        'freelancer_id' => $user->userable->id,
                        'status' => 'applied'

                    ];
                    $project = Project::find($id);
                    $project->update([
                        'status' => 'applied'
                    ]);
                    $jobApplication->create($data);

                    $client = Client::find($project->client_id);
                    $client = $client->user;
                    $client_id = $client->id;
                    $freelancer_id =  $user->id;
                    $friend = Friend::where(static function ($query) use ($client_id, $freelancer_id) {
                        $query->where('user_id',  $freelancer_id)->where('friend_id',  $client_id);
                    })->orWhere(function ($query) use ($client_id, $freelancer_id){
                        $query->where('user_id', $client_id)->where('friend_id',  $freelancer_id);
                    })->get();
                    if(count($friend) < 1){
                        $fr = new Friend();
                        $friendsData = [
                            'user_id' => $client_id,
                            'friend_id' => $freelancer_id
                        ];
                        $free = $fr->create($friendsData);
                        broadcast(new ProjectUpdateEvent())->toOthers();
                        return response('success');
                    }
                    else{
                        broadcast(new ProjectUpdateEvent())->toOthers();
                        return response('success');
                    }

                }
                else{
                    return response('You Have Already Applied For This Job');
                }
            }
            else{
                return response('You Cannot Apply For A Job, Please Update Your profile');
            }
        }else{
            return response('You cannot apply for a job');
        }

    }

    //list of jobs freelancer has applied and waiting for award of offer
    public function jobApplied(){
        $user = auth()->user();
        $projects = ProjectApplication::with('project')->where('status', 'applied')
                                            ->where('freelancer_id', $user->userable->id)->get();

        return response()->json($projects);
    }

    //jobs awarded, awaiting acceptance from freelancer
    public function jobAwarded(){
        $user = auth()->user();
        $projects = JobOffered::with('project')->where('status', 'pending')
                                            ->where('freelancer_id', $user->userable->id)->get();

        return response()->json($projects);
    }

    //list of jobs awaiting payment so freelancer can start working on it
    public function jobAwaitingPayment(){
        $user = auth()->user();
        $projects = JobOffered::with('project')->where('status', 'awaiting payment')
                                            ->where('freelancer_id', $user->userable->id)->get();

        return response()->json($projects);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * */
    public function jobAwaitingAcceptance(){
        $user = auth()->user();
        $projects = JobOffered::with('project')->where('freelancer_id', $user->userable->id)
            ->where(function($q){
                $q->where('status', 'awaiting acceptance')->orWhere('status', 'rejected');
            })->get();

        return response()->json($projects);
    }

    //accept project
    public function acceptProject(Request $request){
        $user = auth()->user();
        $project = Project::find($request->project_id);
        $client_id = $project->client_id;
        $freelancer_id = $user->userable->id;
        $jobOffer = JobOffered::where('project_id', $request->project_id)->first();
        if((int) $jobOffer->freelancer_id === (int) $user->userable->id){
            $jobOffer->update(['status' => 'awaiting payment']);
            $jobOffer->project()->update(['status' => 'accepted']);
            //broadcast(new ProjectUpdateEvent())->toOthers();
            return response('success');
        }
        else{
            return response('error');
        }

    }

    //reject job
    public function rejectProject(Request $request){
        $user = auth()->user();
        $project = Project::find($request->project_id);
        $client_id = $project->client_id;
        $freelancer_id = $user->userable->id;
        $jobOffer = JobOffered::where('project_id', $request->project_id)->first();
        if($jobOffer->freelancer_id === $user->userable->id){
            $jobOffer->project()->update(['status' => 'applied']);
           $application = $user->userable()->projectApplication()->where('project_id', $request->project_id)->get();
           $application->update(['status' => 'decline']);
            $jobOffer->delete();

            broadcast(new ProjectUpdateEvent())->toOthers();
            return response('success');
        }

    }




    public function getClient($id) {
        $client = Client::find($id);
        return response()->json($client);
    }

    public function submit(Request $request) {

        $project = Project::find($request->project_id);
        $project->update(['status' => 'awaiting acceptance']);

        $jobOffered = JobOffered::where('project_id', $request->project_id)->first();

        $jobOffered->update(['status' => 'awaiting acceptance']);
        broadcast(new ProjectUpdateEvent())->toOthers();
        return response('success');
        //return response($jobOffered);

        // submitting of completed projects
    }

    public function review(Request $request, $id){
        $project = Project::find($id);
        $client = Client::find($project->client_id);
        $userId = $client->user->id;

        $review = new Review();
        $review->create([
            'rating' => (int) $request->rating,
            'user_id' => $userId,
            'project_id' => $id,
            'comment' => $request->comment
        ]);
        return response('success');
    }

}
