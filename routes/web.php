<?php

use App\Notifications\DatabaseNotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
Route::get('/notify',function (){
    $users= User::all();
    Notification::send($users, new DatabaseNotification('hello lucifer welcome to our new app'));
});
Route::get('/markallread',function (){
    Auth::user()->notifications->markAsRead();
    return redirect('/home');
});
