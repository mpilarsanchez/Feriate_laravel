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

Auth::routes();

Route::get('/home',function(){
  return redirect('/index');
});
 Route::get('/index', 'CategoriasContoller@index');
 Route::get('/', 'CategoriasContoller@index');
 //
 Route::get('/ferias/categoria/{categoria}', 'FeriasController@datosFerias');
 Route::get('/feria/{id}', 'FeriasController@traerFeria');
 //
 Route::get('/productos/categoria/{categoria}', 'ProductosController@datosProductos');
 //
 Route::middleware(['auth'])->group(function(){
   Route::get('/crearFeria',function(){
     return view('crearFeria');
   });

   Route::post('/crearFeria','FeriasController@crear');
   Route::get("/feria/{id}/cargarProductos","CategoriasContoller@traerCategorias");
   Route::get("/editarFeria/{id}", "FeriasController@edit");
   Route::put("/actualizarFeria/{id}", "FeriasController@update");
   Route::delete("/borrarFeria/{id}", "FeriasController@borrar");
   Route::get("/perfil","UsersController@traerUsuario");
   Route::post('/cargarProductos/{id}','ProductosController@cargar');
   Route::put('/editarProductos/{id}','ProductosController@update');
   Route::delete('/borrarProducto/{id}','ProductosController@borrar');
   Route::get('/editarProducto/{id}','ProductosController@edit');
   Route::get('/carrito', 'CarritoController@cargarCarrito');
   Route::get('/misFerias', 'FeriasController@misFerias');

   Route::get("/editarPerfil/{id}", "UsersController@editUsuario");
   Route::put("/guardarPerfil/{id}", "UsersController@update");
   Route::delete("/borrarUsuario/{id}", "UsersController@borrar");
   Route::post("/agregarCarrito", "CarritoController@agregar");
   Route::post("/quitarCarrito", "CarritoController@quitar");

 });

 Route::post('/search', 'ProductosController@search');
 //static pages
 Route::get('/contacto', function () {
     return view('contacto');
 });
 Route::get('/quienes_somos', function () {
     return view('quienes_somos');
 });
 Route::get('/preguntas', function () {
     return view('preguntas');
 });
 Route::get('/donaciones', function () {
     return view('donaciones');
 });
