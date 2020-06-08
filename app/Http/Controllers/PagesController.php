<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);

        if(Auth::check() && auth::user()->role->name === 'client'){
            $this->middleware(['profile', 'address']);
        }
        else if(Auth::check() && auth::user()->role->name === 'freelancer'){
            $this->middleware(['profile', 'address', 'portfolio']);
        }

    }
    //browse jobs
    public function browseJobs(){
        return view('Pages.browse_jobs');
    }

    //post jobs
    public function postJobs(){
      if(Auth::user()->role->name === 'client') {
          return view('Pages.Client.jobs');
      }
      else if (Auth::user()->role->name === 'freelancer') {
          return view('Pages.Freelancer.jobs');
      }
      else{
          return redirect()->back();
      }
    }
}
