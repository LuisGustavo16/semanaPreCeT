<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Mensagem;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Noticia;

class controllerNoticias extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
    // Fuunção executada logo ao entrar na tela inicial
    public function index()
    {
        Carbon::setLocale('pt_BR');
        //Como essa função é executada ao entrar, foi-se aproveitado para que ela
        //possa re(agendar) as reservas regulares

        /*Essa lógica vai ser usada pois, quando a semana vira, a reserva regular passa a não estar entre
        o primeiro dia da semana (domingo) e o último dia (sabado). Quando ela não estiver mais entre esses dias
        é por que ela deve ser renovada. Ela será renovada somente se:
            - 1: Ela não tiver um dia de cancelamento no dia da renovação, o seja, se ela nao foi cancelada pela professora
            - 2: Se o dia de encerramento dela já expirou
        */

        /*Pega o começo da semana atual*/
        $dataAtual = Carbon::now();
        $inicioSemana = $dataAtual->copy()->startOfWeek();
        /*Pega as reservas regulres*/
        $reservas = Reserva::all(); // Pega todas as reservas regulares

        foreach ($reservas as $item) {
            if ($item->tipo == 'regular') {
                /*  Se (O dia da reserva for menor que o dia do inicio da semana) &&
                    (A data de expiração *NÃO* for menor que o dia da renovação) 
                    quer dizer que ela deve ser renovada
                */
                $reserva = Reserva::find($item->idReserva); // Não estava conseguindo salvar/apagar porr meio do $item no banco de dados depois de alterar

                //Pega o nome do dia da semana (segunda, terçça, etc)
                $diaSemana = Carbon::parse($reserva->dia)->translatedFormat('l');

                // Pegar o dia de renovação
                $dia = Carbon::parse($reserva->dia); // pegando o dia no formato exigido pelo Carbon
                $diaRenovacao = $dia->addDays(7);
                if (($reserva->dia < $inicioSemana) && ($reserva->diaEncerramento > $diaRenovacao)) {
                    $reserva->dia = $diaRenovacao;
                    $reserva->save();
                    $diaRenovadoFormatado = Carbon::parse($diaRenovacao)->format('d/m');
                    $this->gerarMensagemAutomatica($reserva->idAluno, 'Sua reserva regular de ' . $diaSemana . ' foi renovada para o dia ' . $diaRenovadoFormatado);
                } else if ($reserva->diaEncerramento <= $inicioSemana) {
                    // Caso o dia de expiração tenha passado, ele apaga a reserva e manda uma mensagem ao usuario
                    $this->gerarMensagemAutomatica($reserva->idAluno, 'Sua reserva regular de ' . $diaSemana . ' foi expirada. Faça uma 
                    nova reserva regular para poder continuar utilizando a(o) ' . $reserva->local);
                    $reserva->delete();
                }
            } else {
                /*Caso seja uma reserva normal, é preciso ver se ela á teve se dia expirado. Se sim, ela 
                deve ser apagada*/
                if ($item->dia < $inicioSemana) {
                    $reserva = Reserva::find($item->idReserva); // Não estava conseguindo salvar/apagar por meio do $item no banco de dados depois de alterar
                    $reserva->delete();
                }
            }

        }

        // Pega todas as noticias
        $dados = Noticia::all();
        return view('index', compact('dados'));
    }

    public function store(Request $request)
    {
        $dados = new Noticia();
        $dados->titulo = $request->input('titulo');
        $dados->noticia = $request->input('noticia');
        $dados->horario = date('H:i:s');
        $dados->dia = date('Y/m/d');
        $dados->save();
        return redirect()->route('inicio');
    }

    public function destroy(string $idNoticia)
    {
        $dados = Noticia::find($idNoticia);
        if (isset($dados)) {
            $dados->delete();
            return redirect()->route('inicio');
        }
    }

    public function edit(string $idNoticia)
    {
        $dados = Noticia::find($idNoticia);
        if (isset($dados))
            return view('Noticias/editarNoticia', compact('dados'));
    }

    public function update(string $idNoticia, Request $request)
    {
        $dados = Noticia::find($idNoticia);
        $dados->titulo = $request->input('titulo');
        $dados->noticia = $request->input('noticia');
        $dados->horario = date('H:i:s');
        $dados->dia = date('Y/m/d');
        $dados->save();
        return redirect()->route('inicio');
    }

    public function enviaNoticiaEscolhida(string $idNoticia)
    {
        $dados = Noticia::find($idNoticia);
        return view("/Noticias/listarNoticiaEscolhida", compact('dados'));
    }

}
