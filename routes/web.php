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

Route::middleware('CasAuth')->group(function() {
  Route::get('/group/{id}', 'GroupController@show');

  Route::get('/', function () {
      return view('index');
  });

  Route::get('/create-group', function() {
    return view('create_group');
  });

  Route::get('/join-group/{id}/{cwid}', 'GroupController@join');

  Route::middleware('Admin')->group(function() {
    Route::get('/admin', 'GroupController@index');
  });

  Route::get('/preferences', function() {
    return view('pick_preferences');
  });
});

Route::post('/group', 'GroupController@create');

Route::get('/logout', function() {
  cas()->logout();
  session()->flush();
});

Route::post('/join/{id}/{cwid}', 'GroupController@addMember');
Route::get('/decline/{id}/{cwid}', 'GroupController@declineMember');

Route::get('/test', function() {
  return App\Models\ResidenceArea::options();
});
