<?php

use App\Http\Controllers\Api\V1\VacationApprovalController;
use App\Http\Controllers\Api\V1\VacationController;
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


# Routes for my api version 1 :
Route::group(['prefix' => 'v1', 'namespace' => 'V1'], function () {

     Route::apiResources([
          'vacationapprovals' => VacationApprovalController::class,
          'vacations'         => VacationController::class
     ]);
});
