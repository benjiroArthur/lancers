<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //browse jobs
    public function browseJobs(){
        return view('Pages.browse_jobs');
    }

    //post jobs
    public function postJobs(){
        return view('Pages.post-jobs');


    }
}
