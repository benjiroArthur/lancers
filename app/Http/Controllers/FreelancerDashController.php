<?php

namespace App\Http\Controllers;

use App\JobOffered;
use App\Project;
use Illuminate\Http\Request;

class FreelancerDashController extends Controller
{
    // lists all completed projects
    public function completed() {
        $completed = JobOffered::where('status', 'completed')->get();
        return response()->json($completed);
    }

    // lists all projects in progress
    public function progress() {
        $progress = JobOffered::where('status', 'in progress')->get();
        return response()->json($progress);
    }

    // lists projects yet to start
    public function yet() {
        $yet = JobOffered::where('status', 'not started')->get();
        return response()->json($yet);
    }

    // lists all projects either in progress, yet to start or completed
    public function all() {
        $projects = JobOffered::all();
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
