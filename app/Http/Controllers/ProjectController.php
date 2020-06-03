<?php

namespace App\Http\Controllers;

use App\JobType;
use App\JobCategory;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $popularProject = Project::limit(15)->get();
        $recently = Project::latest()->limit(15)->get();
        $projects = [
            'popularProject' => $popularProject,
            'recently' => $recently
        ];

        /*//$pro = Project::find(6);
        $pro = Project::find(6);
        //$pro = JobType::find(6);
        $pro = $pro->job->category;*/

        return response()->json($projects);
    }

        // admin sees all projects...worked here
    public function allProjects($id) {
        $admin = User::findorFail($id)->userable;
        $allprojects = $admin->projects()->all();

        return response()->json($allprojects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
