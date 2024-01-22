<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\{

    AuthController,
    UserController,
    PostController,
    BeatController,
    LikeController

};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





///////////////////////////users///////////////////////////////////////////////////

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::post('forgotPassword', [AuthController::class, 'forgotPassword']);
Route::post('resetpassword', [AuthController::class, 'resetpassword']);

Route::prefix('users')->group(function () {
    Route::get('/AllUsers', [UserController::class, 'AllUsers']);
    Route::get('/detail/{id}', [UserController::class, 'detail']);
});

/////////////////////////Posts///////////////////////////

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::post('/', [PostController::class, 'create']);
    Route::put('/{id}', [PostController::class, 'update']);
    Route::delete('/{id}', [PostController::class, 'delete']);
});


///////////////////Beats////////////////////////////////////

Route::prefix('beats')->group(function () {
    Route::get('/', [BeatController::class, 'index']);
    Route::get('/{id}', [BeatController::class, 'show']);
    Route::post('/', [BeatController::class, 'create']);
    Route::put('/{id}', [BeatController::class, 'update']);
    Route::delete('/{id}', [BeatController::class, 'delete']);
});
Route::get('beats/{beat}/premium-file', [BeatController::class, 'servePremiumFile'])
    ->middleware('premium.file')
    ->name('beats.premiumFile');


//////////////////////Likes////////////////////////////////////
Route::prefix('likes')->group(function () {
    Route::get('/', [LikeController::class, 'index']);
    Route::get('/{id}', [LikeController::class, 'show']);

    Route::post('/{post}/like', [LikeController::class, 'likePost']);
    Route::post('/{beat}/like', [LikeController::class, 'likeBeat']);

});