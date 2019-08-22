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

//Route::get("/usuarios", "UsuariosController@listado");

Route::get('/index', 'CategoriasContoller@index');
Route::get('/', 'CategoriasContoller@index');

 Route::get('/ferias/categoria/{categoria}', function ($categoria) {
     return 'Aca se tienen que mostras todas las ferias de la categoria ..'.$categoria;
 });

 Route::get('/productos/categoria/{categoria}', function ($categoria) {
     return 'Aca se tienen que mostras todos los productos de la categoria ..'.$categoria;
 });

 Route::middleware(['auth'])->group(function(){
   Route::get('/crearFeria',function(){
     return view('crearFeria');
   });

   Route::post('/crearFeria','FeriasController@crear');
   Route::get('/feria/{id}', 'FeriasController@traerFeria');
   Route::get("/editarFeria/{id}", "FeriasController@edit");
   Route::put("/actualizarFeria/{id}", "FeriasController@update");
   Route::delete("/borrarFeria/{id}", "FeriasController@borrar");
 });



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
