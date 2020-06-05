<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // validate request
        $this->validate($request, [
            'last_name' => 'string|required|max:255',
            'first_name' => 'string|required|max:255',
            'email' => 'email|required|max:255|unique:admins|unique:users',
            'password' => 'required|min:8'
        ]);

        $role = Role::where('name', 'admin')->first();
        $allAdmins = User::where('role_id', $role->id)->get();

        $admin = Admin::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'other_name' => $request->other_name,
            'email' => $request->email,
        ]);

        $userrole = Role::where('name', $request->role)->first();
        $users = $admin->user()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $userrole->id
        ]);

        $user = User::findorFail($users->id);
        foreach ($allAdmins as $singleAdmin) {
            $data = [
                'user_id' => $singleAdmin,
                'friend_id' => $user->id,
            ];

            $friend = new Friend();
            $friend->create($data);
        }

        broadcast(new NewUser($user))->toOthers();
        return response(['message' => 'User Created Successfully']);
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
