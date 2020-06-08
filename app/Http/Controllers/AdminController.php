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

    public function getStats() {
        $usersCount = User::all()->count();
        $adminCount = Admin::all()->count();
        $clientsCount = Client::all()->count();
        $freelancerCount = Freelancer::all()->count();
        $usersToday = User::whereDate('created_at', today())->count()->get();
        $usersMonth = User::whereDate('created_at', now()->subDays(30))->count()->get();

        $data = [
            'users' => $usersCount,
            'admin' => $adminCount,
            'client' => $clientsCount,
            'freelancer' => $freelancerCount,
            'users_today' => $usersToday,
            'users_month' => $usersMonth,

        ];
    }


}
