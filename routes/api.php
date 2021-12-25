<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandphoneController;
use App\Http\Controllers\IdController;

// use App\Http\Controllers\API\HandphoneController;
// use App\Http\Controllers\API\AuthController;
// use App\Http\Controllers\API\BaseController;

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

// Route::post('login', [AuthController::class, 'signin']);
// Route::post('register', [AuthController::class, 'signup']);

// Route::middleware('auth:sanctum')->group( function(){
//     Route::resource('handphone', HandphoneController::class);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('handphone',[HandphoneController::class,'index']);
Route::get('Idhandphone', [IdController::class,'getId']);
Route::post('handphone', [HandphoneController::class, 'create']);
Route::put('handphone', [HandphoneController::class, 'update']);
Route::delete('handphone/{id}', [HandphoneController::class, 'delete']);