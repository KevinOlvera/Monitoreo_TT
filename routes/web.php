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

/*
  Tipos de vistas
  -GET      //Obtener datos
  -POST     //Almacenar datos
  -PUT      //Editar datos
  -DELETE   //Eliminar datos
  -RESOURCE
*/

//Rutas del FrontEnd
Route::get('/', [
    'as' => 'front.index',
    'uses' => 'FrontController@index'
]);

Auth::routes();

//Rutas para los usuarios
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('users/dashboard', [
      'uses' => 'FrontController@dashboard',
      'as' => 'admin.users.dashboard'
    ]);

    Route::post('projects/{id}/upload', [
      'uses' => 'ProjectsController@upload',
      'as' => 'admin.projects.upload'
    ]);

    Route::get('projects/file-{id}/download', [
      'uses' => 'ProjectsController@downloadFile',
      'as' => 'admin.projects.download'
    ]);

    Route::post('projects/{id}/date', [
      'uses' => 'ProjectsController@schedule',
      'as' => 'admin.projects.schedule'
    ]);

    Route::get('view/{slug}', [
      'uses' => 'ProjectsController@project',
      'as' => 'admin.projects.project'
    ]);

    Route::get('projects/{slug}/date/{id}/remove', [
      'uses' => 'ProjectsController@remove',
      'as' => 'admin.projects.date.remove'
    ]);

    //Rutas para el administrador
    Route::group(['middleware' => 'synodal'], function() {
      //Rutas del CRUD usuarios
      Route::post('projects/{id}/qualify', [
        'uses' => 'ProjectsController@qualify',
        'as' => 'admin.projects.qualify'
      ]);

      Route::get('projects/{slug}/date/{id}/approve', [
        'uses' => 'ProjectsController@approve',
        'as' => 'admin.projects.date.approve'
      ]);
    });

    //Rutas para el administrador
    Route::group(['middleware' => 'admin'], function() {
      //Rutas del CRUD usuarios
      Route::resource('users', 'UsersController');
      Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as' => 'admin.users.destroy'
      ]);

      //Rutas del CRUD de Proyectos
      Route::resource('projects', 'ProjectsController');
      Route::get('projects/{id}/destroy', [
        'uses' => 'ProjectsController@destroy',
        'as' => 'admin.projects.destroy'
      ]);
    });
});
