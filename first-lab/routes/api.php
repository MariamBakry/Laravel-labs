<?php

use App\Http\Controllers\Api\PostController as ApiPostController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//only auth will make laravel look at session and cookies
//with sanctum => will use tokens
Route::group(['middleware' => ['auth:sanctum']],function () {
    Route::get('posts', [\App\Http\Controllers\Api\PostController::class, 'index']);
    Route::get('posts/{post}', [\App\Http\Controllers\Api\PostController::class, 'show']);
    Route::post('posts', [\App\Http\Controllers\Api\PostController::class, 'store']);
});


// if($request->header('Accept') == 'application/pdf'){
//     return the pdf;
// }



Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});