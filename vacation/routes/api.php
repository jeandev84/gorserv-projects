<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\VacationApprovalController;
use App\Http\Controllers\Api\V1\VacationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


# Routes for api ( version 1 ) :
Route::group(['prefix' => 'v1'], function () {

     Route::apiResources([
          'users'              => UserController::class,
          'vacations'          => VacationController::class,
          'vacationapprovals'  => VacationApprovalController::class,
     ]);
});


# Authentication routes
Route::group(['prefix' => 'auth'], function () {

    Route::post('/login', [LoginController::class, 'index']);
    Route::post('/logout', [LogoutController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);

});
