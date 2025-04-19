<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

  Route::get('top', [PostsController::class, 'index'])->name('top');
  Route::post('postCreate', [PostsController::class, 'postCreate']);
  Route::post('postUpdate', [PostsController::class, 'postUpdate'])->name('postUpdate');
  Route::get('postDelete/{id}', [PostsController::class, 'postDelete'])->name('postDelete');
  Route::post('postDelete/{id}', [PostsController::class, 'postDelete'])->name('postDelete');


  Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
  Route::post('profileUpdate', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
  Route::get('anotherProfile/{id}', [ProfileController::class, 'anotherProfile'])->name('anotherProfile');

  Route::get('search', [UsersController::class, 'search'])->name('search');

  Route::get('follow-list', [FollowsController::class, 'followList'])->name('follow-list');
  Route::get('follower-list', [FollowsController::class, 'followerList'])->name('follower-list');
  Route::get('profileFollowing/{id}', [ProfileController::class, 'profileFollowing'])->name('profileFollowing');
  Route::get('profileUnFollowing/{id}', [ProfileController::class, 'profileUnFollowing'])->name('profileUnFollowing');

  Route::get('following/{id}', [FollowsController::class, 'following'])->name('following');
  Route::get('unFollowing/{id}', [FollowsController::class, 'unFollowing'])->name('unFollowing');

});
