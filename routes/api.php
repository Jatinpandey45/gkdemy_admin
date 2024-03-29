<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('home','HomeController');
Route::resource('category','CategoryController');
Route::resource('month','MonthController');
Route::resource('post','PostController');
Route::resource('tag','TagController');
Route::resource('jobs','JobPostController');
Route::get('all-category','CategoryController@getAllCategoryList');

