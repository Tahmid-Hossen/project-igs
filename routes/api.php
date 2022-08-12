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

Route::get('create/post', 'Api\AdminController@createPost');
Route::get('/posts', 'Api\AdminController@getPost');
Route::post('post/files', 'Api\AdminController@storePost');
Route::get('update/post/{id}', 'Api\AdminController@updatePost');
Route::get('delete/file/{id}', 'Api\AdminController@deletePost');
