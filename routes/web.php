<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DataTableAjaxCRUDController;
//use App\Http\Controllers\API\RoleController;
//use App\Http\Controllers\UserController;

//use App\Http\Controllers\ProjectController;
//use App\Http\Controllers\TaskController;
use App\Http\Controllers\ConversationsController;
use App\http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome');})->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'verified']], function() {

   // Route::resource ('profile', 'ProfileController', [ 'only' => ['edit', 'update', 'destroy', 'show'], 'parameters' => ['profile' => 'user']]);
   Route::resource('profiles', ProfileController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    route::resource('projects', ProjectController::class);
    route::resource('tasks', TaskController::class);
  //  route::resource('affectations', AffectationsController::class);
    route::resource('conversations', ConversationsController::class);

   // Route::get('/conversations', [ConversationsController::class, 'index'])->name('conversations');
    Route::get('/conversations/{user}', [ConversationsController::class, 'show'])->name('conversations.show');

   Route::get('projects/deletedprojects', [ProjectController::class, 'getDeleteProjects'])->name('getDeleteProjects');
Route::get('projects/deletedprojects/{id}', [ProjectController::class, 'restoreDeletedProjects'])->name('restoreDeletedProjects');
Route::get('projects/retoreprojects/{id}', [ProjectController::class, 'deletePermanently'])->name('deletePermanently');



    });





Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index'])->middleware('auth');
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store'])->middleware('auth');
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit'])->middleware('auth');
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy'])->middleware('auth');









use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');