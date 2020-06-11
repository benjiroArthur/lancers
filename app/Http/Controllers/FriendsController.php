<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Friend;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //backup
        $contactList = Auth::user()->friends;
        //for test purposes
        /*if(Auth::user()->role->name === 'freelancer'){
            $role = Role::where('name', 'client')->first();
            $contactList = User::where('role_id', $role->id)->get();
        }
        elseif(Auth::user()->role->name === 'client'){
            $role = Role::where('name', 'freelancer')->first();
            $contactList = User::where('role_id', $role->id)->get();
        }
        else{
            $contactList = User::all();
        }*/

        $unreadIds = Chat::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->user()->id)
            ->where('read', false)
            ->groupBy('from')
            ->get();
        $contactList = $contactList->map(function($contact) use($unreadIds){
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });
        return response()->json($contactList);
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
        // store new friends into the databse

        $friend = new Friend();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $request->friend_id;
        $friend->save();

        // redirect back
        return redirect()->back();
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
