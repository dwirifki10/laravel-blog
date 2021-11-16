<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
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
           "title" => ['required', 'min:8', 'max:149'],
           "photo" => ['mimes:png,jpg,jpeg' ,'max:2000'],
           "category_id" => ["required"],
           "user_id" => ["required"],
           "slug" => ["required", "min:30", "max:3000"]
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
                $path = Storage::putFileAs('images', $file, $newName);
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
                return Redirect::back()->withErrors(['error' => 'Anda belum memasukan gambar']);
            }
        } catch (Exception) {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validation = $this->createVal($request);

       try {
           $path = $this->uploadImg($request, null);
           $validation['photo'] = $path;
           $validation['views'] = 0;

           Posts::create($validation);
           return redirect('table');
       } catch (Exception) {
           return redirect('post');
       }
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
        $validation = $this->createVal($request);

        try {
           $user = Auth::user();
           $post = Posts::where('id', $id)->where('user_id', $user->id)->first();
           $path = $this->uploadImg($request, $post);
           $validation['photo'] = $path;

           $post->update($validation);

           return redirect('table');
        } catch (Exception $err) {
            return redirect('table');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = Auth::user()->id;
            $post = Posts::where('id', $id)->where('user_id', $user)->first();
            if(Storage::disk('local')->exists($post->photo)){
                Storage::delete($post->photo);
            }
            $post->delete();
            return redirect('table');
        } catch (Exception) {
            return redirect('table');
        }
    }
}
