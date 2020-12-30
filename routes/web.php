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

Route::get('/getCatalogos', 'CatalogosController@catalogos');
Route::post('/addCatalogo', 'CatalogosController@store');
Route::get('/delCatalogo/{id}', 'CatalogosController@destroy');
Route::post('/updateCatalogo', 'CatalogosController@update');

Route::get('/getCategorias', 'CategoriasController@getCategorias');
Route::get('/zgetCategorias', 'CategoriasController@getDatos');
Route::get('/getMarcas', 'CategoriasController@getMarcas');
Route::post('/addCategoria', 'CategoriasController@store');
Route::get('/delCategoria/{id}', 'CategoriasController@destroy');
Route::get('/categorias/{id}', 'CategoriasController@show');
Route::post('/updateCategoria', 'CategoriasController@update');

//Ruta buscar
Route::get('search/productos', 'CategoriasController@productos')->name('search.productos');

Route::get('/getPersonal', 'PersonalController@index');
Route::post('/addPersonal', 'PersonalController@store');
Route::get('/deletePersonal/{id}', 'PersonalController@destroy');
Route::post('/editPersonal', 'PersonalController@update');

//Productos
Route::get('/productos', 'ProductosController@index');
Route::get('/getProductos', 'ProductosController@datos');
Route::post('/addProducto', 'ProductosController@store');
Route::post('/updateproducto', 'ProductosController@update');
Route::get('/productos/{id}', 'ProductosController@show');
Route::get('/delProducto', 'ProductosController@destroy');

//Marca
Route::get('/marcas', 'MarcasController@index');
Route::get('/marcas_productos', 'MarcasController@show');
Route::get('/descripcion_producto', 'MarcasController@descripcion');

//2567945504
Route::get('/producto/{cat}/{id}', 'ProductosController@show');
Route::get('{path}', 'HomeController@index');