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
        $users = User::all()->count();
        $admins = Admin::all()->count();
        $clients = Client::all()->count();
        $freelancers = Freelancer::all()->count();
        $usersToday = User::whereData('created_at', today())->get()->count();
        $usersMonthly = User::whereData('created_at', now()->subDays(30))->get()->count();

        $data = [
            'users' => $users,
            'admins' => $admins,
            'clients' => $clients,
            'freelancers' => $freelancers,
            'users_today' => $usersToday,
            'users_monthly' => $usersMonthly,
        ];

        return response()->json($data);

    }
}
