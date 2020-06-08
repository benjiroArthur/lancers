<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Freelancer;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClients(){
        $client = Client::all();
        return response()->json($client);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLancers(){
        $lancers = Freelancer::all();
        return response()->json($lancers);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAdmins(){
        $admin = Admin::all();
        return response()->json($admin);

    }
}
