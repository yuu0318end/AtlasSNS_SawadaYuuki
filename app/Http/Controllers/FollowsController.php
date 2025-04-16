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
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
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
            return back();
        }else{
            return back();
        };
    }

    //フォローを外す
    public function unFollowing(Request $request)
    {
        $unFollowing = Follow::where('following_id', Auth::id())->where('followed_id', $request->id)->delete();
        return back();
    }

    //フォロー数、フォロワー数カウント
    public function Counter()
    {
        $followCount = Follow::where('following_id', Auth::id())->count();
        $followerCount = Follow::where('followed_id', Auth::id())->count();
        return view('layouts.login',[
            'followCount'=>$followCount,
            'followerCount'=>$followerCount,
        ]);
    }


}
