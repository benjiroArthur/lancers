<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'profile']);

       /*  if(Auth::check() && auth::user()->role->name === 'freelancer'){
            $this->middleware(['portfolio']);
        }*/

    }
    //browse jobs
    public function browseJobs(){
        return view('Pages.browse_jobs');
    }

    //payment
    public function paymentDetails(){
        return view('Pages.checkout');
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
