<?php

namespace App\Http\Controllers;

use App\JobOffered;
use App\ProjectApplication;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class FreelancerDashController extends Controller
{
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

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * */
    // freelancers see only approved jobs...worked here
    public function approvedJobs($id) {
        $freelance = User::findorFail($id)->userable;
        $approvedjobs = $freelance->projects()->where('approved', 1)->get();
        return response()->json($approvedjobs);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function applyForJobs(Request $request) {
        $this->validate($request, [
            'client_id' => 'required',
        ]);

        $jobapplication = new ProjectApplication();
        $data = $request->all();
        $data['freelancer_id'] = auth()->user()->userable->id;

        $jobapplication = $jobapplication->create($data);
        return response()->json($jobapplication);


    }

    public function profile() {

        // fetching the data for the profile
    }

    public function submit() {

        // submitting of completed projects
    }



}
