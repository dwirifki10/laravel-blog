<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Validation data request
     *
     * @return \Illuminate\Http\Response
     */
    public function createVal($request)
    {
       $validation = $request->validate([
           "name" => ['required', 'min:8', 'max:249'],
           "photo" => ['mimes:png,jpg,jpeg' ,'max:2000'],
           "address" => ["required", "max:35", "min:3"],
           "status" => ["min:15", "max:249"]
       ]);

       return $validation;
    }

    /**
     * Upload & checking image
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadImg($request, $post)
    {
        try {
            $file = $request->file('photo');
            if($file != ""){
                $newName = "image_" . time() . "." . $file->extension();
                $path = Storage::putFileAs('photos', $file, $newName);
                if($post != null){
                    if(Storage::disk('local')->exists($post->photo)){
                        Storage::delete($post->photo);
                    }
                }
                return $path;
            }else{
                if($post != null){
                    if(Storage::disk('local')->exists($post->photo)){
                        return $post->photo;
                    }
                }
                return null;
            }
        } catch (Exception $err) {
            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = $this->createVal($request);

        try {
           $id = Auth::user()->id;
           $user = User::where('id', $id)->first();
           $path = $this->uploadImg($request, $user);
           $validation['photo'] = $path;

           $user->update($validation);
           return redirect('home');
        } catch (Exception $err) {
            return redirect('home');
        }
    }
}
