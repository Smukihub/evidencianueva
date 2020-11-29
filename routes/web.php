<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Producto;
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
//Route::get('cate','CategoriasControler@index');
Route::get('/','HomeController@getCat');
Route::get('/listaproducto', 'HomeController@getProd');
//Route::get('categoria/{nombre}', 'HomeController@getsearch');
//Route::get('/pruebas', function () {
  // return view('pruebas');
	//$cat=Categoria::find(1)->productos;
	//return $cat;
//});
Route::get('/salir', function() {
    Auth::logout();
    return view('autenticar');     
});
Route::get('autenticar', function() {
    return view('autenticar'); 
    //buscara el archivo 'autenticar.php' o 'autenticar.blade.php' dentro de resoureces/views
});
Route::get('tablero', function() {
    return view('supervisor.tablero'); 
    //buscara el archivo 'tablero.php' o 'tablero.blade.php' dentro de resoureces/views/supervisor
});
Route::get('revisar', function() {
    return view('encargado.revisar'); 
});
Route::get('cuenta', function() {
    return view('cliente.cuenta'); 
});
Route::post('validar'        , 'AutenticarControler@validar');
Route::get('listar_por_categoria/{categoria_id}','BuscarControler@listar_por');
//Route::get('create', function() {
 //   return view('categoria.create'); 
//});


//Route::get('categoria','CategoriasControler@index');
//Route::post('categoria','CategoriasControler@store');
//Route::get('categoria/create','CategoriasControler@create');
Route::get('categoria/{categoria}/show','CategoriasControler@show');
//Route::put('categoria/{categoria}','CategoriasControler@update');
//Route::delete('categoria/{categoria}','CategoriasControler@destroy');
//Route::get('categoria/{categoria}/edit','CategoriasControler@edit');
Route::resource('categoria','CategoriasControler');

Route::resource('producto','ProductoController');
Route::get('producto/{producto}/show','ProductoController@show');
//rutas Usuarios
//Route::get('user','UserControler@index');
//Route::get('user/{user}/editar','UserControler@edit');
Route::get('user/{user}/show','UserControler@show');
//Route::post('user','UserControler@store');
//Route::get('user/crear' ,'UserControler@create');

Route::resource('user','UserControler');


