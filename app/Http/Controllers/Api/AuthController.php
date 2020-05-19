<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Freelancer;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users|unique:clients|unique:freelancers',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required'
        ]);

        $data['email'] = $request->email;
        $role = Role::where('name', $request->user_type)->firstOrFail();
        if($request->user_type === 'client'){

            $newUser = Client::create($data);
        }
        else{
            $newUser = Freelancer::create($data);
        }

        $user = $newUser->user()->create([
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'role_id'=> $role->id
        ]);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken]);

    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request){
        $validateData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if(!auth()->attempt($validateData)){
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

    }
}
