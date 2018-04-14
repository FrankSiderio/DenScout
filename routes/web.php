<?php

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

Route::middleware('CasAuth')->group(function() {
  Route::get('/group/{id}', 'GroupController@show');

  Route::middleware('Admin')->group(function() {
    Route::get('/admin', 'GroupController@index');
  });
});

Route::get('/logout', function() {
  cas()->logout();
  session()->flush();
});

Route::get('/email', function() {
  return App\Models\Group::requestMember(20056533, 20047432);
});
