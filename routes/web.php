<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UpcomingController;
use App\Http\Controllers\API\TodayController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'API\ProjectController@index')->middleware('auth');
Auth::routes();

// Route::get('/projects/{project}', 'ProjectController@getProjects');
