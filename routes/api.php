<?php

use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\MobileAppController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('UserRegister',[UserController::class,'register']);
Route::post('UserLogin',[UserController::class,'login']);
Route::post('DeviceRegister',[DeviceController::class,'registerDevice']);
Route::post('AppRegister',[MobileAppController::class,'appRegister']);
Route::post('subscribe',[PurchaseController::class,'purchase']);
Route::post('subscription_check',[PurchaseController::class,'subscription_Check']);
Route::post('cancel_subscription',[PurchaseController::class,'cancel_subscription']);
