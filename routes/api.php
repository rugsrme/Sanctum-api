<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkorderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('workorder', WorkorderController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('csrf', function () {
    dd(csrf_token());
});

  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/login', [AuthController::class, 'login']);

// Auth::routes();
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
