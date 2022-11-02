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


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\TopController;
use App\Mail\Test;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [TopController::class, 'index'])
->middleware('auth');


Route::get('/test', function () {
    Mail::to('posse@example.com')->send(new Test);
    return 'メール送信しました！';
});


// Route::get('/home', 'HomeController@index')->name('home');
