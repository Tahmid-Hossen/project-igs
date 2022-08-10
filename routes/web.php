<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin Routes
Route::get('admin/login', 'Admin\LoginController@showLoginForm');
Route::post('admin/login', 'admin\LoginController@login')->name('admin.login');
Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');
Route::get('create/post', 'AdminController@createPost')->name('create.post');
Route::post('post/files', 'AdminController@storePost')->name('store.post');
Route::get('all/files', 'AdminController@index')->name('all.post');
Route::get('view/file/{id}', 'AdminController@view')->name('view.post');
Route::get('delete/files/{id}', 'AdminController@deletePost')->name('delete.post');

// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
// $this->get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
// $this->post('password/confirm', 'Auth\ConfirmPasswordController@confirm');