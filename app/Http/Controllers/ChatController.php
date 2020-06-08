<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\Auth;
use App\User;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('Chat.index');
    }


       public function contacts()
        {
            $contact = Auth::user()->friends;
            return response()->json($contact);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
       $this->validate($request,[
           'to' => 'required',
           'chat' => 'required'
       ]);

       $data = $request->all();
       $data['from'] = \auth()->user()->id;
       $chat = new Chat();
       $chat = $chat->create($data);

       //broadcast chat message
        broadcast(new NewMessage($chat))->toOthers();

       return response()->json($chat);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /* $friends = User::find($id);
        return view('Chat.show')->withFriend($friends);*/
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

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * */
    public function getChat($id) {
        $chats = Chat::where(function ($query) use ($id) {
            $query->where('from',  Auth::user()->id)->where('to',  $id);
        })->orWhere(function ($query) use ($id){
            $query->where('from', $id)->where('to',  Auth::user()->id);
        })->get();

        return $chats;
    }
}
