<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follow_user = Follow::where('following_id', Auth::id())->pluck('followed_id');
        $follow_icon = User::whereIn('id',$follow_user)->get();
        $follow_post = Post::whereIn('user_id',$follow_user)->latest()->get();
            return view('follows.followList',[
            'follow_icon'=>$follow_icon,
            'follow_post'=>$follow_post,
        ]);
    }
    public function followerList(){
        $follow_user = Follow::where('followed_id', Auth::id())->pluck('following_id');
        $follow_icon = User::whereIn('id',$follow_user)->get();
        $follow_post = Post::whereIn('user_id',$follow_user)->latest()->get();
            return view('follows.followerList',[
            'follow_icon'=>$follow_icon,
            'follow_post'=>$follow_post,
        ]);
    }

    //フォローする
    public function following(Request $request)
    {
        $check = Follow::where('following_id', Auth::id())->where('followed_id', $request->id);

        if($check->count() == 0){
            $follow = new Follow;
            $follow->following_id = Auth::id();
            $follow->followed_id = $request->id;
            $follow->save();
            return redirect('/search');
        }else{
            return redirect('/search');
        };
    }

    //フォローを外す
    public function unFollowing(Request $request)
    {
        $unFollowing = Follow::where('following_id', Auth::id())->where('followed_id', $request->id)->delete();
        return redirect('/search');
    }

}
