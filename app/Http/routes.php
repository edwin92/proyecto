<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('intereses', 'InteresesController');
Route::resource('users', 'UserController');
Route::resource('intusers', 'IntUserController');
Route::resource('logauth', 'LogController');
Route::resource('imguser', 'ImgUserController');
Route::resource('events', 'EventController');
Route::resource('calevents', 'CalEventController');
Route::resource('calusers', 'CalUserController');
Route::resource('chats', 'ChatController');
Route::resource('comevents', 'ComEventController');
Route::resource('hischats', 'HisChatController');
Route::resource('imgevents', 'ImgEventController');
Route::resource('intevents', 'IntEventController');
Route::resource('parceros', 'ParcerosController');