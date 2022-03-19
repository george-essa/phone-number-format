<?php

use App\Http\Controllers\Api\V1\PhoneController;
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

Route::group(['prefix' => 'v1'], function (){
    Route::get('phone-numbers', [PhoneController::class, 'index']);
    Route::get('phone-numbers-filters', [PhoneController::class, 'getFilters']);
});