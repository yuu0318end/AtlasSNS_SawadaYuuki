<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {

    $followUsersId = Auth::user()->following->pluck('id')->push(Auth::user()->id);
    $followPost = Post::whereIn('user_id', $followUsersId)->latest()->get();
    $followIcon = User::whereIn('id', $followUsersId)->get();

    return view('posts.index', [
        'follow_icon' => $followIcon,
        'follow_post' => $followPost,
    ]);
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

        if(!empty($up_post)){
        Post::where('id', $id)->update(['post' => $up_post]);
        }
        return redirect('/top');
    }

    public function postDelete($id)
    {
        $deleteId = Post::where('id', $id)->first();
        $deleteId->delete();
        return redirect('/top');
    }

}
