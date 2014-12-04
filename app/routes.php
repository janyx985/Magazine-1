<?php

// Nos mostrará el formulario de login.
Route::get('login', 'AuthController@showLogin');
Route::get('admin', 'AuthController@showLogin');

// Validamos los datos de inicio de sesión.
Route::post('login', 'AuthController@postLogin');
Route::post('admin', 'AuthController@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    /*Route::get('/', function()
    {
        return View::make('hello');
    });
    */
    //Route::resource('/','PostController');
	//Route::resource('admin','PostController');
    Route::resource('posts', 'PostController');
    Route::resource('admin/users', 'Admin_UsersController');

 });
 // Esta ruta nos servirá para cerrar sesión.
 Route::get('logout', 'AuthController@logOut');

Route::get('/', function()
    {
        return View::make('hello');
    });
