<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;
use App\Models\Follow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;

class ProfileController extends Controller
{
    public function profile(Request $request){
        return view('profiles.profile');
    }

    public function profileUpdate(Request $request){
        $request->validate([
        'upUsername' => 'required|between:2,12',
        'upMail' => 'required|between:5,40|email|unique:users,email,' .Auth::user()->email. ',email',
        'upPassword' => 'required|regex:/^[a-zA-Z0-9]+$/|between:8,20|confirmed',
        'upBio' => 'max:150',
        'upIcon' => 'image|mimes:jpg,png,bmp,gif,svg',
        ]);

        $id = Auth::id();
        $up_username = $request->input('upUsername');
        $up_mail = $request->input('upMail');
        $up_password = $request->input('upPassword');
        $hash_up_password = Hash::make($up_password);
        $up_bio = $request->input('upBio');

        User::where('id',$id)->update([
            'username' => $up_username,
            'email' => $up_mail,
            'password' => $hash_up_password,
            'bio' => $up_bio,
        ]);

        if ($request->hasFile('upIcon')) {
            $file = $request->file('upIcon');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('public/images', $fileName);
            User::where('id', $id)->update(['icon_image' => $fileName]);
        }
        return redirect('/top');
    }

    public function anotherProfile($id){
        $userId = User::where('id',$id)->first();
        $postId = Post::Where('user_id',$id)->get();
        $check = Follow::where('following_id', Auth::id())->pluck('followed_id');
    return view('profiles.anotherProfile',[
        'userId'=>$userId,
        'postId'=>$postId,
        'check'=>$check,
    ]);
    }

        //フォローする
    public function profileFollowing(Request $request)
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
    public function profileUnFollowing(Request $request)
    {
        $unFollowing = Follow::where('following_id', Auth::id())->where('followed_id', $request->id)->delete();
        return back();
    }
}
