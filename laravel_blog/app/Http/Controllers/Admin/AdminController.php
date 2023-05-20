<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Posts;
use Egulias\EmailValidator\Warning\Comment;
use Exception;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            if($id == 1) {
                $users = User::latest()->get();
                return view("dashboard.layouts.main", ["results" => $users]);
            }else if($id == 2) {
                $posts = Posts::latest()->get();
                return view("dashboard.layouts.article", ["results" => $posts]);
            }else {
                $comments = Comments::with("userComment")->get();
                return view("dashboard.layouts.comment", ["results" => $comments]);
            }
        } catch (Exception $err) {
            dd($err->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        try {
            //code...
        } catch (Exception $err) {
            dd($err->getMessage());
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
            //code...
        } catch (Exception $err) {
            dd($err->getMessage());
        }
    }
}
