<?php

use App\Http\Controllers\MesscontactController;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;

Route::view('/', 'Inicio')->name('Inicio');
Route::get('/Productos', 'ProductController@index')->name('products');
Route::view('/Contactanos','contact')->name('contact');
Route::get('/admin', 'UsersController@index')->name('admin.users')->middleware('verified');



Route::post('Contactanos', 'MesscontactController@store');

Auth::routes(['verify' => true]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
