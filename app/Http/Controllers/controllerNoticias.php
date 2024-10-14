<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Noticia;

class controllerNoticias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Noticia::all();
        return view('index', compact('dados'));
    }

    public function store(Request $request) {
        $dados = new Noticia();
        $dados->titulo = $request->input('titulo');
        $dados->noticia = $request->input('noticia');
        $dados->horario = date('H:i:s');        
        $dados->dia = date('Y/m/d');
        $dados->save();
        return redirect()->route('inicio');
    }

    public function destroy(string $idNoticia) {
        $dados = Noticia::find($idNoticia);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('inicio');
        }
    }

    public function edit(string $idNoticia) {
        $dados = Noticia::find($idNoticia);
        if (isset($dados))
            return view('Noticias/editarNoticia', compact('dados'));
    }

    public function update (string $idNoticia, Request $request) {
        $dados = Noticia::find($idNoticia);
        $dados->titulo = $request->input('titulo');
        $dados->noticia = $request->input('noticia');
        $dados->horario = "10:40";        
        $dados->dia = "2024/07/20";
        $dados->save();
        return redirect()->route('inicio');
    }

    public function enviaNoticiaEscolhida (string $idNoticia) {
        $dados = Noticia::find($idNoticia);
        return view("/Noticias/listarNoticiaEscolhida", compact('dados'));
    }

}
