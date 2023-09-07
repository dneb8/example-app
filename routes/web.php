<?php

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Agrgamos una ruta de contacto */
Route::get('/contacto/{tipo?}', function ($tipo = null) {
    /*dd($tipo);*/
    return view('contacto', compact('tipo'));
    /*return view('contacto')->with(['tipo' => $tipo]);*/

});

Route::post('/validar-contacto', function (Request $request) {
    /*dd($request->correo);*/
    $contacto = new Contacto(); /*Instancia del modelo contacto*/
    $contacto->correo = $request -> correo;
    $contacto->comentario = $request -> comentario;
    /*Los timestamps se ponen en automático*/
    $contacto->save();
    
    return redirect()->back();
});



