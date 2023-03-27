<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });

// ログイン
    Route::get('/auth', 'App\Http\Controllers\AuthController@lineLogin')->name('login');
    Route::get('/top/line_auth', 'AuthController@handleLineCallback')->name('auth.line_callback');


Route::middleware(['auth'])->group(function(){
  //トップページ
  Route::get('/', 'App\Http\Controllers\MessagesController@index');
  Route::resource('messages', 'App\Http\Controllers\MessagesController');
});
