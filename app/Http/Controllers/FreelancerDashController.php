<?php

namespace App\Http\Controllers;

use App\JobOffered;
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

    public function jobs() {
        $jobs = Project::all();
        return response()->json($jobs);
    }

    public function profile() {

        // fetching the data for the profile
    }

    public function submit() {

        // submitting of completed projects
    }



}
