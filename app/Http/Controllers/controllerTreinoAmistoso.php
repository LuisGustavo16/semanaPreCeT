<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Mensagem;
use App\Models\TreinoAmistoso;
use App\Models\Modalidade;
use App\Models\Chekin;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Carbon\Carbon;
use View;

class controllerTreinoAmistoso extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*Envia todos os dados para serem listados*/
    public function index()
    {
        $dados = TreinoAmistoso::all();
        foreach ($dados as $item) {
            $modalidade = Modalidade::find($item->idModalidade);
            $item->nomeModalidade = $modalidade->nome;
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        }
        return view('TreinosAmistosos/listarTreinos', compact('dados'));
    }

    /*Pega as modalidades e retorna a página de cadastro de treino, para que as modalidades fiquem como opção*/
    public function create()
    {
        $modalidades = Modalidade::all();
        return view('TreinosAmistosos/cadastrarTreino', compact('modalidades'));
    }

    /*Ao clicar em um treino, os dados dele serão enviados*/
    public function verTreino(string $idTreino)
    {
        $dados = TreinoAmistoso::find($idTreino);
        /*Pegar os chekins do treino*/
        $chekins = Chekin::all()->where('idTreino', $idTreino);
        foreach ($chekins as $item) {
            $aluno = Aluno::find($item->idAluno);
            $item->nomeAluno = $aluno->name;
            $item->turmaAluno = $aluno->turma . " " . $aluno->curso;
        }
        /*Trocar o formato do dia e do horário*/
        $dados->dia = Carbon::parse($dados->dia)->format('d/m');
        $dados->horarioInicio = Carbon::parse($dados->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
        $dados->horarioFim = Carbon::parse($dados->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        $modalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/listarTreinoEscolhido', compact('dados', 'modalidade', 'chekins'));
    }

    /*Recebe o id de um dado para ser editado e posteriormente edita ele*/
    public function update(string $idTreino, Request $request)
    {
        $dados = TreinoAmistoso::find($idTreino);
        if (isset($dados)) {
            $dados->idModalidade = $request->input('idModalidade');
            $dados->dia = $request->input('dia');
            $dados->horarioInicio = $request->input('horarioInicio');
            $dados->horarioFim = $request->input('horarioFim');
            $dados->numeroMaximoParticipantes = $request->input('numeroMaximoParticipantes');
            $dados->genero = $request->input('genero');
            $dados->publico = $request->input('publico');
            $dados->local = $request->input('local');
            $dados->responsavel = $request->input('responsavel');
            $dados->observacao = $request->input('observacao');
            if ($dados->save())
                return redirect()->route('indexTreino')->with('success', 'Treino editado com sucesso!!');
            else
                return redirect()->route('indexTreino')->with('danger', 'Erro ao tentar editar o treino...');
        }
        return redirect()->route('indexTreino')->with('danger', 'Erro ao tentar editar o treino...');
    }

    /*Cadastra um novo dado na tabela*/
    public function store(Request $request)
    {
        $dados = new TreinoAmistoso();
        $dados->idModalidade = $request->input('idModalidade');
        $dados->dia = $request->input('dia');
        $dados->horarioInicio = $request->input('horarioInicio');
        $dados->horarioFim = $request->input('horarioFim');
        $dados->numeroMaximoParticipantes = $request->input('numeroMaximoParticipantes');
        $dados->genero = $request->input('genero');
        $dados->publico = $request->input('publico');
        $dados->local = $request->input('local');
        $dados->responsavel = $request->input('responsavel');
        $dados->observacao = $request->input('observacao');
        $dados->vagasOcupadas = 0;
        if ($dados->save())
            return redirect()->route('indexTreino')->with('success', 'Treino cadastrado com sucesso!!');
        else
            return redirect()->route('indexTreino')->with('danger', 'Erro ao tentar cadastrar um novo treino...');
    }

    /*Apaga um dado da tabela*/
    public function destroy(string $id)
    {
        $dados = TreinoAmistoso::find($id);
        if (isset($dados)) {
            //Cria a mensagem para enviar ao aluno
            $modalidade = Modalidade::find($dados->idModalidade);
            $checkins = Chekin::where('idTreino', $id)->get();
            foreach ($checkins as $item) {
                $mensagem = new Mensagem();
                $mensagem->conteudo = 'O treino de ' . $modalidade->nome . ' ' . $dados->genero .
                    ', do dia ' . $dados->horarioInicio . ' - ' . $dados->horarioFim . ' que iria ocorrer no(a) ' . $dados->local . ' foi cancelado';
                $mensagem->idAluno = $item->idAluno;
                $mensagem->dia = Carbon::now();
                $mensagem->horario = Carbon::now();
                $mensagem->save();
            }


            $dados->delete();
            return redirect()->route('indexTreino');
        }
    }
    public function destroyMany(Request $request)
    {
        $dados = $request['treino'];
        if (isset($dados)) {
            foreach ($dados as $item) {
                $treino = TreinoAmistoso::find($item);
                $treino->delete();
            }
            return redirect()->route('indexTreino')->with('success', 'Treinos apagados sucesso!!');
        }
        return redirect()->route('indexTreino')->with('danger', 'Selecione ao menos um treino...');
    }

    /*Envia os dados para serem editados*/
    public function edit(string $idTreino)
    {
        $dados = TreinoAmistoso::find($idTreino);
        $modalidades = Modalidade::all();
        $nomeModalidade = Modalidade::find($dados->idModalidade);
        if (isset($dados))
            return view('TreinosAmistosos/editarTreino', compact('dados', 'modalidades', 'nomeModalidade'));
    }

    public function apagarTreinosAntigos()
    {
        $dataHoje = new Carbon();
        $dados = TreinoAmistoso::where('dia', '<', $dataHoje)->get();
        foreach ($dados as $item) {
            $item->delete();
        }
        return redirect()->route('indexTreino')->with('success', 'Treinos apagados sucesso!!');
    }

    public function marcarPresenca(Request $request, string $idTreino)
    {
        $dados = $request['checkins'];
        if (isset($dados)) {
            // Primeiro limpa a presença, pra que quando ela desmarque um, ele tenha sua presença tirada
            $checkins = Chekin::where('idTreino', $idTreino)->get();
            foreach ($checkins as $item) {
                $checkin = Chekin::find($item->idCheckin);
                $checkin->situacao = false;
                $checkin->save();
            }
            foreach ($dados as $item) {
                $checkin = Chekin::find($item);
                $checkin->situacao = true;
                $checkin->save();
            }
            return redirect()->back()->with('success', 'Presença registrada com sucesso!');
        }
        return redirect()->back()->with('danger', 'Selecione ao menos um aluno.');
    }

    public function gerarPDF(string $idTreino)
    {
        Carbon::setLocale('pt_BR');
        $chekins = Chekin::where('idTreino', $idTreino)->get();
        $alunos = [];
        foreach ($chekins as $item) {
            $aluno = Aluno::find($item->idAluno);
            if ($item->situacao == true)
                $aluno->situacao = 'Presente';
            else if ($item->situacao == false)
                $aluno->situacao = 'Falta';
            array_push($alunos, $aluno);
        }
        usort($alunos, function ($a, $b) {
            return $a['name'] > $b['name'];
        });

        // Passar o nome da modalidade
        $treino = TreinoAmistoso::find($idTreino);
        $modalidade = Modalidade::find($treino->idModalidade);
        $treino->modalidade = $modalidade->nome;
        //Formatar o dia
        $diaCarbon = Carbon::parse($treino->dia);
        $treino->dia = $diaCarbon->format('d/m') . ' (' . $diaCarbon->translatedFormat('l') . ')';
        //formatar o horario
        $treino->horarioInicio = Carbon::parse($treino->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
        $treino->horarioFim = Carbon::parse($treino->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
        $info = 'Lista gerada no dia ' . Carbon::now()->format('d/m') . ' à(s) ' . Carbon::now()->
            timezone('America/Sao_Paulo')->format('H:i:s') . ' pelo SIGEE.';
        ///////////////////////////////////////////////////////////////////
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Habilita PHP no HTML (se necessário)
        $dompdf->setOptions($options);

        // Renderiza a view Blade para HTML
        $html = View::make('TreinosAmistosos/chamadaGerarPDF', [
            'alunos' => $alunos,
            'treino' => $treino,
            'info' => $info
        ])->render();

        $dompdf->loadHtml($html);

        // Define o papel e a orientação
        $dompdf->setPaper('A4');

        // Renderizando o HTML como PDF

        $dompdf->render();

        // Enviando o PDF para o navegador
        return $dompdf->stream('chamada.pdf');
    }

   

}
