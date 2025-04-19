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
        $updateId = Post::where('id',$id)->first();

        if($updateId->user_id === Auth::id()){
        Post::where('id', $id)->update(['post' => $up_post,]);
        }else{
            abort(403, 'この投稿を編集する権限がありません。');
        }
        return redirect('/top');
    }

    public function postDelete($id)
    {
        $deleteId = Post::where('id', $id)->first();
        if($deleteId->user_id === Auth::id()){
            $deleteId->delete();
        }else {
            abort(403, 'この投稿を削除する権限がありません。');
        }

        return redirect('/top');
    }

}
