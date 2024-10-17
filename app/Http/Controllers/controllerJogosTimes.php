<?php

namespace App\Http\Controllers;

use App\Models\JogosTimes;
use Illuminate\Http\Request;

class controllerJogosTimes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    
    public function create(string $idTime)
    {
        return view('Jogos/cadastrarJogo', compact('idTime'));
    }

    public function store(Request $request, string $idTime)
    {
        $dados = new JogosTimes();
        $dados->dia = $request->input("dia");
        $dados->horario = $request->input("horario");
        $dados->local = $request->input("local");
        $dados->observacao = $request->input("observacao");
        $dados->idTime = $idTime;
        $dados->save();
        return redirect()->route('verTime', ['idTime' => $idTime]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $idJogo, string $idTime)
    {
        $dados = JogosTimes::find($idJogo);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('verTime', ['idTime' => $idTime]);
        }
    }
}
