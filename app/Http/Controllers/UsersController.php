<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
    $users = User::get();
    return view('users.search',['users'=>$users]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }
        return view('users.search',[
            'users'=>$users,
            'keyword'=>$keyword,
        ]);
    }
}
