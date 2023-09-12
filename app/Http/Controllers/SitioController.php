<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function contactoForm($tipo = null)
    {
         /*dd($tipo);*/
        return view('contacto', compact('tipo'));
        /*return view('contacto')->with(['tipo' => $tipo]);*/
    }

    public function contactoSave(Request $request)
    {
        /*dd($request->correo);*/
        /****VALIDACIÓN****/
        $request->validate([
            'correo'=> 'required|email',
            'comentario'=>['required','min:5','max:50'],
        ]);
        $contacto = new Contacto(); /*Instancia del modelo contacto*/
        $contacto->correo = $request -> correo;
        $contacto->comentario = $request -> comentario;
        /*Los timestamps se ponen en automático*/
        $contacto->save();
        
        return redirect()->back();
    }
}
