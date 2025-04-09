<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
    $users = User::get();
    return view('posts.index',['users'=>$users]);
    }

    public function search(){
        return view('users.search');
    }
}
