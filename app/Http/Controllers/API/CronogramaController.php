<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\JogosTimes;
use App\Models\Mensagem;
use App\Models\Time;
use App\Models\Modalidade;
use App\Models\TreinoAmistoso;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class CronogramaController extends Controller
{
    use ApiResponse;
    use HasApiTokens;

    public function index(Request $request)
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
            $treino->diaSemana = $diaCarbon->translatedFormat('l');
        }
        foreach ($jogos as $jogo) {
            $diaCarbon = Carbon::parse($jogo->dia);
            $jogo->diaSemana = $diaCarbon->translatedFormat('l');
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
        }
        foreach ($jogos as $jogo) {
            $time = Time::find($jogo->idTime);
            $modalidade = Modalidade::find($time->idModalidade);
            $jogo->modalidade = $modalidade->nome;
            $jogo->time = $time->competicao . ' ' . $time->genero;
        }

        return response()->json([
            'jogos' => $jogos,
            'treinos' => $treinos,
            'inicioSemana' => $inicioSemana,
            'fimSemana' => $fimSemana
        ]);
    }


}
