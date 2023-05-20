<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $posts = Posts::where('user_id', Auth::user()->id)
                        ->orderBy('views', 'desc')
                        ->take(3)
                        ->get();
            return view('home', ['posts' => $posts]);
        } catch (Exception $err) {
            return redirect('home');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function post()
    {
        try {
            $categories = Categories::get();
            return view('post', ['categories' => $categories]);
        } catch (QueryException $err) {
            return redirect('post');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function table()
    {
        try {
            $posts = Posts::where('user_id', Auth::user()->id)->paginate(5);
            return view('table', ['posts' => $posts]);
        } catch (QueryException $err) {
            return redirect('table');
        }
    }

        /**
     * Show the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $post = Posts::with('categoryPost')
                            ->where('id', $id)
                            ->where('user_id', Auth::user()->id)
                            ->first();
            $categories = Categories::get();
            return view('update', compact('post', 'categories'));
        } catch (QueryException $err) {
            return redirect('post');
        }
    }


}
