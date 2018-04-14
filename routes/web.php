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
    return view('index');
});

Route::middleware('CasAuth')->group(function() {

  Route::get('/preferences', function() {
    return view('pick_preferences');
  });

  Route::get('/create-group', function() {
    return view('create_group');
  });

  Route::get('/test', function () {
    return "Successfully authorized with Marist CAS";
  });
});

Route::get('/logout', function () {
  cas()->logout();
  session()->flush();
});
