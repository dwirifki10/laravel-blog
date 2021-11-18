<?php

namespace App\Http\Controllers\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Posts;
use App\Models\Stars;
use Illuminate\Support\Facades\DB;
use Exception;

class PublicController extends Controller
{
    public function index()
    {
        try {
            $categories = Categories::all();
            $posts = $this->popular();
            return view('welcome', compact('categories', 'posts'));
        } catch (Exception $err) {
            return redirect('/');
        }
    }

    public function show(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $popular = $this->popular();
            $post = Posts::with(['userPost', 'commentPost.userComment',
                                'commentPost.child.userComment',
                                'starPost'
                        ])->where('id', $id)
                        ->first();
            Posts::where('id', $id)->update(['views' => DB::raw('views+1')]);
            DB::commit();
            return view('show', compact('post', 'popular'));
        } catch (Exception $err) {
            DB::rollBack();
            return redirect('/');
        }
    }

    public function popular()
    {
        try {
            $posts = Posts::orderBy('views', 'desc')->paginate(6);
            return $posts;
        } catch (Exception $err) {
            return redirect('/');
        }
    }

    public function comment(Request $request, $id)
    {
        $this->middleware('auth');

        $validation = $request->validate([
            "user_id" => ['numeric'],
            "post_id" => ['numeric'],
            "parent_id" => ['numeric'],
            "comment" => ['required', 'max:249', 'min:3']
        ]);

        $validation['user_id'] = $request->user;
        $validation['post_id'] = $id;
        $validation['parent_id'] = $request->parent;

        try {
            Comments::create($validation);
            return redirect('show/'. $id);
        } catch (Exception $err) {
            return redirect('/');
        }
    }

    public function star(Request $request)
    {
        $this->middleware('auth');

        $validation = $request->validate([
            "user_id" => ['numeric'],
            "post_id" => ["numeric"],
            "value" => ['numeric']
        ]);

        $validation["user_id"] = $request->user_id;
        $validation["post_id"] = $request->post_id;

        try {
            Stars::create($validation);
            return redirect('show/' . $request->post_id);
        } catch (Exception) {
            return redirect('/');
        }
    }

    public function category($id){
        try {
            $posts = Posts::with('categoryPost')
                            ->where('category_id', $id)
                            ->paginate(6);
            $categories = Categories::all();
            return view('category', compact('posts', 'categories'));
        } catch (Exception $err) {
            return redirect('/');
        }
    }
}
