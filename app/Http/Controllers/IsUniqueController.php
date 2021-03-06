<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class IsUniqueController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function email(Request $request){
        $email = $request->email;
        $rules = array('email' => 'required|string|email|max:255|unique:users|unique:clients|unique:freelancers');
        $validator = Validator::make($email, $rules);
        if($validator->fails()){
            return false;
        }

        return true;
    }
}
