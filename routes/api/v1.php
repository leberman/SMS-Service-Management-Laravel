<?php

use App\Http\Controllers\Api\V1\Member\IndexContoller;
use App\Http\Controllers\Api\V1\Sms\StoreController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('members')->as('members:')->group(callback: function () {
    Route::get('/', IndexContoller::class)->name('index'); // [api:v1:members:index]
});

Route::prefix('sms')->as('sms:')->group(callback: function () {
    Route::post('/', StoreController::class)->name('store'); // [api:v1:sms:store]
});