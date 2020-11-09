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
Route::get('/', function () {
    return view('pagina.inicio');
})->middleware('checkAuth');;
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/autenticacion', 'userController@index');
Route::get('/verificar', 'IngresosController@verificar');
Route::get('/getUsers', 'userController@show');
Route::get('/changeStatusUsers/{id}/{user}', 'userController@update');
Route::get('/reset/{user}', 'userController@reset');
Route::get('/create/{user}', 'userController@create');
//rutas administrador


Route::get('/getConfiguraciones', 'ConfiguracionesController@index');
Route::post('/addConfig', 'ConfiguracionesController@store');
Route::get('/deleteConfig/{id}', 'ConfiguracionesController@destroy');
Route::post('/editConfig', 'ConfiguracionesController@update');

Route::get('/getCatalogos', 'CatalogosController@index');
Route::post('/addCatalogo', 'CatalogosController@store');
Route::get('/deleteCatalogo/{id}', 'CatalogosController@destroy');
Route::post('/updateCatalogo', 'CatalogosController@update');
//2567945504
Route::get('{path}', 'HomeController@index');