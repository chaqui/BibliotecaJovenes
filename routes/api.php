<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * rutas para el autor
 */
Route::resource('/autor', 'AutorController');
Route::get('/autor/{autor}/libros', 'AutorController@obtenerLibros')->name("autor.libros");

/**
 * Rutas para el editorial
 */
Route::resource('/editorial', 'EditorialController');
Route::get('/editorial/{editorial}/libros', 'EditorialController@obtenerLibros')->name("editorial.libros");

Route::resource('/libro', 'libroController');