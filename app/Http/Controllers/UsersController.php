<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $check = Follow::where('following_id', Auth::id());

        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->where("id" , "!=" , Auth::user()->id)->get();
        }else{
            $users = User::where("id" , "!=" , Auth::user()->id)->get();
        }
        return view('users.search',[
            'users'=>$users,
            'keyword'=>$keyword,
            'check'=>$check,
        ]);
    }
}
