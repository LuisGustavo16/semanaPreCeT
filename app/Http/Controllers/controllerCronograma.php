<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JogosTimes;
use App\Models\Time;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TreinoAmistoso;
use App\Models\Modalidade;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class controllerCronograma extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Carbon::setLocale('pt_BR');
        /*Pega a semana atual*/
        $dataAtual = Carbon::now();
        $semanaAtual = $dataAtual->weekOfYear;

        /*Pega o começo e o fim da semana atual no formato para mostrar*/
        $inicioSemana = $dataAtual->copy()->startOfWeek()->format('d/m');
        $fimSemana = $dataAtual->copy()->endOfWeek()->format('d/m');

        /*Pega o começo e o fim da semana atual no formato para fazer a pesquisa no BD*/
        $inicio = $dataAtual->copy()->startOfWeek();
        $fim = $dataAtual->copy()->endOfWeek();

        /*Pega os treinos e os jogos da semana atual*/
        $treinos = TreinoAmistoso::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();
        $jogos = JogosTimes::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();

        /*Passa o formato da data do BD para dia/mês*/
        foreach ($treinos as $treino) {
            $diaCarbon = Carbon::parse($treino->dia);
            $treino->dia = $diaCarbon->translatedFormat('l');
        }
        foreach ($jogos as $jogo) {
            $diaCarbon = Carbon::parse($jogo->dia);
            $jogo->dia = $diaCarbon->translatedFormat('l');
        }

        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($treinos as $treino) {
            $treino->horarioInicio = Carbon::parse($treino->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $treino->horarioFim = Carbon::parse($treino->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        }
        foreach ($jogos as $jogo) {
            $jogo->horarioInicio = Carbon::parse($jogo->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $jogo->horarioFim = Carbon::parse($jogo->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        }

        /*Pegar a modalidade de cada time e jogo*/
        foreach ($treinos as $treino) {
            $modalidade = Modalidade::find($treino->idModalidade);
            $treino->modalidade = $modalidade->nome;
            $treino->tipo = 'Treino';
        }
        foreach ($jogos as $jogo) {
            $time = Time::find($jogo->idTime);
            $modalidade = Modalidade::find($time->idModalidade);
            $jogo->modalidade = $modalidade->nome;
            $jogo->tipo = 'Jogo';
            $jogo->time = $time->competicao . ' ' . $time->genero;
        }

        // Juntar tudo e ordenar em um vetor para listar
        $treinos = $treinos->toArray();
        $jogos = $jogos->toArray();
        $atividades = array_merge($treinos, $jogos);
        usort($atividades, function ($a, $b) {
            return $a['dia'] >= $b['dia'];
        });
        usort($atividades, function ($a, $b) {
            return $a['horarioInicio'] >= $b['horarioInicio'];
        });
        return view('Cronograma/cronograma', compact('inicioSemana', "fimSemana", "atividades"));
    }

    public function gerarPDF()
    {
        Carbon::setLocale('pt_BR');
        /*Pega a semana atual*/
        $dataAtual = Carbon::now();
        $semanaAtual = $dataAtual->weekOfYear;

        /*Pega o começo e o fim da semana atual no formato para mostrar*/
        $inicioSemana = $dataAtual->copy()->startOfWeek()->format('d/m');
        $fimSemana = $dataAtual->copy()->endOfWeek()->format('d/m');

        /*Pega o começo e o fim da semana atual no formato para fazer a pesquisa no BD*/
        $inicio = $dataAtual->copy()->startOfWeek();
        $fim = $dataAtual->copy()->endOfWeek();

        /*Pega os treinos e os jogos da semana atual*/
        $treinos = TreinoAmistoso::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();
        $jogos = JogosTimes::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();

        /*Passa o formato da data do BD para dia/mês*/
        foreach ($treinos as $treino) {
            $diaCarbon = Carbon::parse($treino->dia);
            $treino->dia = $diaCarbon->translatedFormat('l');
        }
        foreach ($jogos as $jogo) {
            $diaCarbon = Carbon::parse($jogo->dia);
            $jogo->dia = $diaCarbon->translatedFormat('l');
        }

        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($treinos as $treino) {
            $treino->horarioInicio = Carbon::parse($treino->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $treino->horarioFim = Carbon::parse($treino->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        }
        foreach ($jogos as $jogo) {
            $jogo->horarioInicio = Carbon::parse($jogo->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $jogo->horarioFim = Carbon::parse($jogo->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        }

        /*Pegar a modalidade de cada time e jogo*/
        foreach ($treinos as $treino) {
            $modalidade = Modalidade::find($treino->idModalidade);
            $treino->modalidade = $modalidade->nome;
            $treino->tipo = 'Treino';
        }
        foreach ($jogos as $jogo) {
            $time = Time::find($jogo->idTime);
            $modalidade = Modalidade::find($time->idModalidade);
            $jogo->modalidade = $modalidade->nome;
            $jogo->tipo = 'Jogo';
            $jogo->time = $time->competicao . ' ' . $time->genero;
        }

        // Juntar tudo e ordenar em um vetor para listar
        $treinos = $treinos->toArray();
        $jogos = $jogos->toArray();
        $atividades = array_merge($treinos, $jogos);
        usort($atividades, function ($a, $b) {
            return $a['dia'] >= $b['dia'];
        });
        usort($atividades, function ($a, $b) {
            return $a['horarioInicio'] >= $b['horarioInicio'];
        });

        ///////////////////////////////////////////////////////////////////
        $dompdf = new Dompdf();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Habilita PHP no HTML (se necessário)
        $dompdf->setOptions($options);

        // Renderiza a view Blade para HTML
        $html = View::make('Cronograma/cronogramaPDF', [
            'inicioSemana' => $inicioSemana,
            'fimSemana' => $fimSemana,
            'atividades' => $atividades,
        ])->render();

        $dompdf->loadHtml($html);

        // Define o papel e a orientação
        $dompdf->setPaper('A4', 'landscape');

        // Renderizando o HTML como PDF

        $dompdf->render();

        // Enviando o PDF para o navegador
        return $dompdf->stream('treinos.pdf');


    }
}
