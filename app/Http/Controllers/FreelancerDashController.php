<?php

namespace App\Http\Controllers;

use App\JobOffered;
use App\ProjectApplication;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class FreelancerDashController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'freelancer', 'profile', 'address', 'portfolio']);
    }
    // lists all completed projects
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function completed($id) {
        $freelance = User::findOrFail($id)->userable;
        $completed = $freelance->jobOffered()->where('status', 'completed')->with('project')->latest()->get();

        return response()->json($completed);
    }

    // lists all projects in progress
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function progress($id) {
        $freelance = User::findOrFail($id)->userable;
        $progress = $freelance->jobOffered()->where('status', 'in progress')->with('project')->latest()->get();

        return response()->json($progress);
    }

    // lists projects yet to start
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function yet($id) {
        $freelance = User::findOrFail($id)->userable;
        $yet = $freelance->jobOffered()->where('status', 'not started')->with('project')->latest()->get();

        return response()->json($yet);
    }

    // lists all projects either in progress, yet to start or completed
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function all($id) {
        $freelance = User::findOrFail($id)->userable;
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
        $projects = $freelance->jobOffered()->with('project')->latest()->limit(3)->get();

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
        if($user->profile_updated === true){
            $jobApp = ProjectApplication::where('project_id', $id)->where('freelancer_id', $user->userable->id)->first();

           if($jobApp === null){
               $jobApplication = new ProjectApplication();
               $data = [
                   'project_id' => $id,
                   'freelancer_id' => $user->userable->id,
                   'status' => 'applied'

               ];
               $jobApplication->create($data);
               return response('success');
           }
           else{
               return response('You Have Already Applied For This Job');
           }
        }
        else{
            return response('You Cannot Apply For A Job, Please Update Your profile');
        }

    }
    public function jobApplied(){
        $user = auth()->user();
        $projects = ProjectApplication::with('project')->where('status', null)
                                            ->where('freelancer_id', $user->userable->id)->get();

        return response()->json($projects);
    }



    public function profile() {

        // fetching the data for the profile
    }

    public function submit() {

        // submitting of completed projects
    }



}
