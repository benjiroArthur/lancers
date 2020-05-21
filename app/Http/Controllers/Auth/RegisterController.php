<?php

namespace App\Http\Controllers\Auth;

use App\Client;
use App\Freelancer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users|unique:clients|unique:freelancers',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data2['email'] = $data['email'];
        $role = Role::where('name', $data['user_type'])->firstOrFail();
        if($data['user_type'] === 'client'){

            $newUser = Client::create($data2);
        }
        else{
            $newUser = Freelancer::create($data2);
        }
        return $newUser->user()->create([
            'email' => $data['email'],
            'role_id' => $role->id,
            'password' => Hash::make($data['password']),
        ]);
    }
}
