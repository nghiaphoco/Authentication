<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['prefix' => 'auth', 'namespace' => 'api\Auth', 'middleware' => ['api','throttle:21,5']], function () {
    Route::post('/register', 'RegisterController@register');
    Route::post('/login', 'LoginController@login');
});

Route::group(['namespace' => 'api\Auth', 'middleware' => ['jwtnew']], function () {
    Route::get('/me', 'MeController@me');
});
