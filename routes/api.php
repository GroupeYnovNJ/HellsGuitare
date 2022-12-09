<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;

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

Route::middleware('auth:api')->group(function(){
    Route::get('/', function(Request $request) {
        $user = new \App\Http\Resources\Api\V1\UserResource($request->user());
        return response()->json(['success' => true, 'msg' => 'success', 'user' => $user], 422);
    });

    Route::get('/users', [UserController::class, 'index']);

    Route::post('/users', [UserController::class, 'store']);

    Route::patch('/user/{user}', [UserController::class, 'update']);

    Route::delete('/user/{user}', [UserController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});