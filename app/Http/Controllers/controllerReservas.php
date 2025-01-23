<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Mensagem;
use Carbon\Carbon;

class controllerReservas extends Controller
{
   public function __construct () {
        $this -> middleware('auth');
    }

    private function gerarMensagemAutomatica($idAluno, $conteudo)
    {
        //Cria a mensagem para enviar ao aluno
        $mensagem = new Mensagem();
        $mensagem->conteudo = $conteudo;
        $mensagem->idAluno = $idAluno;
        $mensagem->dateTime = Carbon::now();
        $mensagem->tipo = 'Sistema';
        $mensagem->save();
    }

    /*Envia todas as reservas de acordo com o tipo para serem listadas*/
    public function index(string $status) {
        Carbon::setLocale('pt_BR');
        $dados = Reserva::all()->where('status', $status);
        foreach ($dados as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia);
            $item->diaSemana = Carbon::parse($item->dia)->translatedFormat('l');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');;
            $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
            $item->dia = Carbon::parse($item->dia)->format('d/m');
        }
        return view('Reservas/listarReservas', compact('dados', 'status'));
    }

    /*Ao clicar em uma reserva, os dados dele serão enviados*/
    public function enviaReservaEscolhido(string $idReserva) {
        Carbon::setLocale('pt_BR');
        $dados = Reserva::find($idReserva);
        /*Trocar o formato do dia e do horário*/
        $dados->dia = Carbon::parse($dados->dia);
        if ($dados->diaCancelamento)
            $dados->diaCancelamento = Carbon::parse($dados->diaCancelamento)->format('d/m');
        $dados->diaSemana = Carbon::parse($dados->dia);
        $dados->diaSemana = Carbon::parse($dados->diaSemana)->translatedFormat('l');
        $dados->dia = Carbon::parse($dados->dia)->format('d/m');
        $dados->horarioInicio = Carbon::parse($dados->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
        $dados->horarioFim = Carbon::parse($dados->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');

        $aluno = Aluno::find($dados->idAluno);
        if (isset($dados))
            return view('Reservas/listarReservaEscolhida', compact('dados', 'aluno'));
    }

    /*Quando uma reserva é cancelada*/
    public function destroy(string $idSolicitacao, string $status, Request $request) {
        $dados = Reserva::find($idSolicitacao);
        $this->gerarMensagemAutomatica($dados->idAluno, "Sua reserva foi negada/cancelada com a seguinte observação: " . $request->input('observacao'));
        $dados->status = 'N';
        $dados->save();
        return redirect()->route('indexReserva', ['status' => $status]);

    }

    function aceitarReserva (string $idReserva, Request $request) {
        $reserva = Reserva::find($idReserva);
        $reserva->status = 'A';
        $reserva->observacao = $request->input('observacao');
        $reserva->save();

        //Cria a mensagem para enviar ao aluno
        $diaReserva = Carbon::parse($reserva->dia)->format('d/m');
        $this->gerarMensagemAutomatica($reserva->idAluno, "Sua reserva no " . $reserva->local . " do dia " . 
            $diaReserva . " foi aceita, com  a seguinte observação: " . $reserva->observacao);

        return redirect()->route('indexReserva', ['status' => 'P']);
    }

    function cancelarRegular(string $idReserva, Request $request) {
        // Encontrar a reserva pelo id
        $reserva = Reserva::find($idReserva);
        
        // Verificar se a data de cancelamento é antes da data da reserva
        if ($request->input('diaCancelamento') < $reserva->dia) {
            // Se for, retorna com uma mensagem de erro (danger)
            session()->flash('status', 'danger');
            session()->flash('message', 'A data de cancelamento não pode ser anterior à data da reserva.');
            return redirect()->route('indexReserva', ['status' => 'A']);
        }
    
        // Atualiza a reserva com a data de cancelamento e observação
        $reserva->diaCancelamento = $request->input('diaCancelamento');
        $reserva->observacao = $request->input('observacao');
        $reserva->save();
        $dia = Carbon::parse($reserva->diaCancelamento)->format('d/m');
    
        // Retorna com uma mensagem de sucesso (success)
        session()->flash('status', 'success');
        session()->flash('message', 'Reserva regular cancelada com sucesso para o dia ' . $dia . ".");
        return redirect()->route('indexReserva', ['status' => 'A']);
    }
}
