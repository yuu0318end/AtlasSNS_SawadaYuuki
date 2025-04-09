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

  Route::get('top', [PostsController::class, 'index']);
  Route::post('postCreate', [PostsController::class, 'postCreate']);
  Route::post('postUpdate', [PostsController::class, 'postUpdate'])->name('postUpdate');
  Route::get('/postDelete/{id}', [PostsController::class, 'postDelete'])->name('postDelete');
  Route::post('/postDelete/{id}', [PostsController::class, 'postDelete'])->name('postDelete');


  Route::get('profile', [ProfileController::class, 'profile']);

  Route::get('search', [UsersController::class, 'search']);

  Route::get('follow-list', [FollowsController::class, 'followList']);
  Route::get('follower-list', [FollowsController::class, 'followerList']);

});
