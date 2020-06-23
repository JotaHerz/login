<?php

use App\Http\Controllers\MesscontactController;

Route::view('/', 'Inicio')->name('Inicio');
Route::get('/Productos', 'ProductController@index')->name('products');
Route::view('/Contactanos','contact')->name('contact');



Route::post('Contactanos', 'MesscontactController@store');

Auth::routes();

