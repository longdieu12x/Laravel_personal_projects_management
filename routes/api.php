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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/projects', 'API\ProjectController@store')->name('project.post');

Route::apiResources([
    'upcomings' => 'API\UpcomingController',
    'todays' => 'API\TodayController',
]);

// GET UPCOMINGS
Route::get('/upcomings/{upcoming}', 'API\UpcomingController@getUpcomings');

// GET TODAYS
Route::get('/todays/{today}', 'API\TodayController@getTodays');
