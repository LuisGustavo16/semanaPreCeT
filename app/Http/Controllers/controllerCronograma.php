<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TreinoAmistoso;
use App\Models\Modalidade;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class controllerCronograma extends Controller
{

    public function index()
    {
        /*Pega a semana atual*/
        $dataAtual = Carbon::now();
        $semanaAtual = $dataAtual->weekOfYear;

        /*Pega o começo e o fim da semana atual no formato para mostrar*/
        $inicioSemana = $dataAtual->copy()->startOfWeek()->format('d/m');
        $fimSemana = $dataAtual->copy()->endOfWeek()->format('d/m');

        /*Pega o começo e o fim da semana atual no formato para fazer a pesquisa no BD*/
        $inicio = $dataAtual->copy()->startOfWeek();
        $fim = $dataAtual->copy()->endOfWeek();

        /*Pega os treinos da semana atual*/
        $treinos = TreinoAmistoso::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();

        /*Passa o formato da data do BD para dia/mês*/
        foreach ($treinos as $treino) {
            $treino->dia = Carbon::parse($treino->dia)->format('d/m');
        }

        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($treinos as $treino) {
            $treino->horario = Carbon::parse($treino->horario)->format('h:m');
        }

        $modalidades = Modalidade::all();

        return view('Cronograma/cronograma', compact('inicioSemana', "fimSemana", "treinos", "modalidades"));
    }

    public function gerarPDF()
    {
        /// Pega os dados, manda pro cronogramaPDF para poder formar o PDF
        $dataAtual = Carbon::now();
        $semanaAtual = $dataAtual->weekOfYear;

        /*Pega o começo e o fim da semana atual no formato para mostrar*/
        $inicioSemana = $dataAtual->copy()->startOfWeek()->format('d/m');
        $fimSemana = $dataAtual->copy()->endOfWeek()->format('d/m');

        /*Pega o começo e o fim da semana atual no formato para fazer a pesquisa no BD*/
        $inicio = $dataAtual->copy()->startOfWeek();
        $fim = $dataAtual->copy()->endOfWeek();

        /*Pega os treinos da semana atual*/
        $treinos = TreinoAmistoso::whereBetween('dia', [$inicio, $fim])->orderBy('dia', 'asc')->get();

        /*Passa o formato da data do BD para dia/mês*/
        foreach ($treinos as $treino) {
            $treino->dia = Carbon::parse($treino->dia)->format('d/m');
        }

        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($treinos as $treino) {
            $treino->horario = Carbon::parse($treino->horario)->format('h:m');
        }

        $modalidades = Modalidade::all();
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
            'treinos' => $treinos,
            'modalidades' => $modalidades
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
