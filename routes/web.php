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

/**
 * rutas para el autor
 */
Route::resource('/autor', 'AutorController');
Route::get('/autor/{autor}/libros', 'AutorController@obtenerLibros');

/**
 * Rutas para el editorial
 */
Route::resource('/editorial', 'EditorialController');
Route::get('/editorial/{editorial}/libros', 'EditorialController@obtenerLibros');