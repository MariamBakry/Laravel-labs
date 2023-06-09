<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


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

Route::group(['middleware' => ['auth']], function(){

    Route::get('/posts',[PostController::class, 'index']) -> name('posts.index');

    Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');

    Route::get("/posts/removeOld",[PostController::class, "removeOldPosts"]);

    Route::post('/posts',[PostController::class, 'store']) -> name('posts.store');

    Route::post('/posts/{post}/comment',[PostController::class, 'storeComment']) -> name('posts.storeComment');

    Route::get('/posts/{post}',[PostController::class, 'show']) -> name('posts.show');

    Route::get('/posts/{post}/edit',[PostController::class, 'edit']) -> name('posts.edit');

    Route::get('/posts/edit/{comment}',[PostController::class, 'editComment']) -> name('posts.editComment');

    Route::put('/posts/{post}',[PostController::class, 'update']) -> name('posts.update');

    Route::put('/posts/comment/{comment}',[PostController::class, 'updateComment']) -> name('posts.updateComment');

    Route::delete('/posts/{post}', [PostController::class, 'destroy']) -> name('posts.destroy');

    Route::delete('/posts/comment/{comment}', [PostController::class, 'destroyComment']) -> name('posts.destroyComment');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/auth/github/redirect',[PostController::class,'githubredirect'])->name('githublogin');
Route::get('/auth/github/callback',[PostController::class,'githubcallback']);

Route::get('/auth/google/redirect',[PostController::class,'googleredirect'])->name('googlelogin');
Route::get('/auth/google/callback',[PostController::class,'googlecallback']);
