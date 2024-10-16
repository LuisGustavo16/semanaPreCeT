<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Aluno;
use Carbon\Carbon;

class controllerReservas extends Controller
{
    /*Envia todas as reservas de acordo com o tipo para serem listadas*/
    public function index(string $status) {
        $dados = Reserva::all()->where('status', $status);
        foreach ($dados as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->format('h:m');
            $item->horarioFim = Carbon::parse($item->horarioFim)->format('h:m');
        }
        return view('Reservas/listarReservas', compact('dados'));
    }

    /*Ao clicar em uma reserva, os dados dele serão enviados*/
    public function enviaReservaEscolhido(string $idReserva) {
        $dados = Reserva::find($idReserva);
        $aluno = Aluno::find($dados->idAluno);
        if (isset($dados))
            return view('Reservas/listarReservaEscolhida', compact('dados', 'aluno'));
    }

    /*Quando uma reserva é cancelada, rejitada ou expirada*/
    public function destroy(string $idSolicitacao, string $status, Request $request) {
        $dados = Reserva::find($idSolicitacao);
        if (isset($dados)) {
            $dados->delete();
        }
        return redirect()->route('indexReserva', ['status' => $status]);

    }

    function aceitarReserva (string $idReserva, Request $request) {
        $reserva = Reserva::find($idReserva);
        $reserva->status = 'A';
        $reserva->save();
        return redirect()->route('indexReserva', ['status' => 'P']);
    }
}
