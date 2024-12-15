<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class ReservasController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idAluno' => 'required|integer',
            'dia' => 'required|date',
            'horarioInicio' => 'required',
            'horarioFim' => 'required',
            'finalidade' => 'required|string',
            'status' => 'required|string',
            'tipo' => 'required|string',
            'numeroPessoas' => 'required|integer',
            'local' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error("Erro de validação!", 400, $validator->errors());
        }

        try {
            $dados = Reserva::create($request->all());
            return $this->success([], "Cadastro realizado com sucesso!!!");
        } catch (\Throwable $th) {
            return $this->error("Erro ao registrar reserva!!!", 401, $th->getMessage());
        }
    }

    public function index()
    {
        try {
            Carbon::setLocale('pt_BR');
            /*Pega o começo e o fim da semana atual no formato para mostrar*/
            $dataAtual = Carbon::now();
            $inicioSemana = $dataAtual->copy()->startOfWeek()->format('d/m');
            $fimSemana = $dataAtual->copy()->endOfWeek()->format('d/m');

            /*Pega o começo e o fim da semana atual no formato para fazer a pesquisa no BD*/
            $inicio = $dataAtual->copy()->startOfWeek();
            $fim = $dataAtual->copy()->endOfWeek();

            $dados = Reserva::whereBetween('dia', [$inicio, $fim])->orderBy('dia')->get();
            foreach ($dados as $item) {
                /*Trocar o formato do dia e do horário*/
                $diaCarbon = Carbon::parse($item->dia);
                // Formata a data para 'd/m'
                $item->dia = $diaCarbon->format('d/m');
                // Obtém o nome do dia da semana traduzido
                $diaSemana = $diaCarbon->translatedFormat('l');
                // Adiciona o nome da semana no dia
                $item->dia = $item->dia . ' ' . $diaSemana;
                $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
                $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');
                $nome = Aluno::find($item->idAluno);
                $item->nomeAluno = $nome->name;
            }
            return response()->json([
                'dados' => $dados,
                'inicioSemana' => $inicioSemana,
                'fimSemana' => $fimSemana
            ]);
        } catch (\Throwable $th) {
            return $this->error("Erro ao registrar reserva!!!", 401, $th->getMessage());

        }
    }

    // Mostra as reservas de m determinado aluno
    public function mostrarReservas(Request $request)
    {
        $dados = Reserva::all()->where('idAluno', $request->get('idAluno'));
        return response()->json([
            'dados' => $dados,
        ]);
    }


}
