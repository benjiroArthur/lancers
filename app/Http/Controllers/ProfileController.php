<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Link;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }


    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse
     * */
    public function profile(Request $request)
    {
        //get the authenticated user and update their records
        $user = Auth()->user();
        $user->userable()->update($request->all());
        $user->update(['profile_updated' => 1]);
        return response()->json($user);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\Response
     * */
    public function profilePicture(Request $request)
    {
        //get the authenticated user
        $user = Auth()->user();
        $email = $user->email;
        $email = explode('@', $email);
        $email = $email[0];
        $oldImage = $user->userable->profile_picture;

        if($request->hasfile('profile_picture')){
            //validate file type

                $this->validate($request, [
                    'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
                ]);

            $image_file = $request->file('profile_picture');

            $imageNameWithExt = $image_file->getClientOriginalName();
            //Get just extension
            $extension = $image_file->getClientOriginalExtension();

            //Filename to store
            $imageNameToStore = $email.time().'.'.$extension;

            //upload file

            //resize image
            $image = Image::make($image_file->getRealPath())->fit(400,300)->encode();
            //$image->save(asset('images/users/'), $imageNameToStore);

          if($oldImage !== 'noimage.jpg'){
              if(Storage::disk('profile-picture')->exists($oldImage)){
                  Storage::disk('profile-picture')->delete($oldImage);
              }
          }

            Storage::disk('profile-picture')->put($imageNameToStore, $image);


            //save filename in database
            $user->userable->update([
                'profile_picture' => $imageNameToStore
            ]);

            return response(['message' => 'success']);
        }
        //if no file selected
        return response(['message' => 'no file selected']);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse
     * */
    public function portfolio(Request $request){
        //validte request
        $this->validate($request, ['title' => 'required']);
        //get the authenticated user and update their records
        $user = Auth()->user();
        $portfolio = $user->userable->portfolio;
        if(count($portfolio) < 1){
            $port = $user->userable->portfolio()->create($request->all());

        }
        else{
           $user->userable->portfolio->update($request->all());
            $port = $user->userable->portfolio;
        }
        return response()->json($port);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse
     * */
    public function addLinks(Request $request){
        //validte request
        $this->validate($request, ['name' => 'required']);
        //get the authenticated user and update their records
        $user = Auth()->user();
        $link = $user->userable->links()->create($request->all());
        return response()->json($link);
    }

    /**
     * @param Request $request
     * @param $id
     * @throws \Illuminate\Validation\ValidationException
     * @return \Illuminate\Http\JsonResponse
     * */
    public function editLink(Request $request, $id){
        //validte request
        $this->validate($request, ['name' => 'required']);

        //get the current link
        $link = Link::findOrFail($id);
        if(auth()->user()->userable->id === $link->freelancer_id){
            $link = $link->update($request->all());
            return response()->json($link);
        }
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //save address
    public function address(Request $request){

        $address = auth()->user()->address;
        if($address === null){
        auth()->user()->address()->create($request->all());
        return response("success");
        }else{
            auth()->user()->address()->update($request->all());
            return ("success");
        }
    }

}
