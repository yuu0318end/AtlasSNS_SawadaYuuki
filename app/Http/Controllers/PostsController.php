<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::get();
        return view('posts.index',['posts'=>$posts]);
    }

    public function postCreate(Request $request)
    {
        $request->validate([
        'newPost' => 'required|between:1,150',
        ]);

        $posts = $request->input('newPost');
        Post::create([
            'user_id' => Auth::user()->id,
            'post' => $posts,
        ]);

        return back();
    }

    public function postUpdate(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        Post::where('id', $id)->update([
            'post' => $up_post,
        ]);
        return redirect('/top');
    }

    public function postDelete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }

}
