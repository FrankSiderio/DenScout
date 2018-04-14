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

use App\Jobs\RequestMember;
use Carbon\Carbon;

Route::get('/', function () {
    return view('index');
});

Route::get('/create-group', function() {
  return view('create_group');
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
  $job = (new RequestMember(20056533, 20097232))
        ->delay(Carbon::now()->addSeconds(10));
  dispatch($job);
});

Route::get('/join/{id}/{cwid}', 'GroupController@addMember');
Route::get('/decline/{id}/{cwid}', 'GroupController@declineMember');
