<?php

use App\category;
use App\Http\Controllers\MesscontactController;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use App\Http\Middleware\RoleMiddleware;

Route::view('/', 'Inicio')->name('Inicio');
Route::get('/Productos', 'ProductController@index')->name('products.index');
Route::get('/Productos/crear','ProductController@create')->name('products.create');
Route::get('/Productos/{product}/editar','ProductController@edit')->name('products.edit');
Route::delete('/Productos/{product}','ProductController@destroy')->name('products.destroy');
Route::patch('/Productos/{product}','ProductController@update')->name('products.update');
Route::post('/Productos', 'ProductController@store')->name('products.store');
Route::get('/Productos/{product}','ProductController@show')->name('products.show');
Route::get('categorias/{category}', 'CategoryController@show')->name('categories.show');




Route::view('/Contactanos','contact')->name('contact');
Route::get('/admin', 'UsersController@index')->name('admin.users')->middleware('verified', RoleMiddleware::class);
Route::get('/edit/{usuario}', 'UsersController@store')->name('edit.usuarios')->middleware('verified', RoleMiddleware::class);
Route::patch('/edit/{usuario}', 'UsersController@update')->name('update.usuarios')->middleware('verified', RoleMiddleware::class);





Route::post('Contactanos', 'MesscontactController@store');

Auth::routes(['verify' => true]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

