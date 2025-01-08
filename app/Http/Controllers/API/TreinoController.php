<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\TreinoAmistoso;
use App\Models\Chekin;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class TreinoController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idAluno' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->error("Erro de validação!", 400, $validator->errors());
        }

        $dados = TreinoAmistoso::all();
        foreach ($dados as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->timezone('America/Sao_Paulo')->format('H:i');
            $item->horarioFim = Carbon::parse($item->horarioFim)->timezone('America/Sao_Paulo')->format('H:i');

            $modalidade = Modalidade::find($item->idModalidade);
            $item->nomeModalidade = $modalidade->nome;
        }
        $checkins = Chekin::where("idAluno", $request->get('idAluno'))->get();
        return response()->json([
            'dados' => $dados,
            'checkins' => $checkins
        ]);
    }

    public function realizarChekin(Request $request) {
        $validator = Validator::make($request->all(), [
            'idAluno' => 'required',
            'idTreino' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error("Erro de validação!", 400, $validator->errors());
        }

        try {
            $testeVerificacao = Chekin::where("idAluno", $request->get("idAluno"))->where("idTreino", $request->get("idTreino"))->first();
            if (!isset($testeVerificacao)) {
                $dados = Chekin::create($request->all());
                $treino = TreinoAmistoso::find($request->get("idTreino"));
                $treino->vagasOcupadas += 1;
                $treino->save();
                return $this->success([], "Checkin realizado com sucesso!!!");
            } else {
                return "errrorooo";
            }
        } catch (\Throwable $th) {
            return $this->error("Erro ao registrar checkin!!!", 401, $th->getMessage());
        }
    }

    public function cancelarChekin(Request $request) {
        $validator = Validator::make($request->all(), [
            'idAluno' => 'required',
            'idTreino' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->error("Erro de validação!", 400, $validator->errors());
        }

        try {
            $dados = Chekin::where("idAluno", $request->get("idAluno"))->where("idTreino", $request->get("idTreino"));
            $treino = TreinoAmistoso::find($request->get("idTreino"));
            $treino->vagasOcupadas -= 1;
            $treino->save();
            $dados->delete();
            return $this->success([], "Checkin cancelado com sucesso!!!");
        } catch (\Throwable $th) {
            return $this->error("Erro ao cancelar checkin!!!", 401, $th->getMessage());
        }
    }

    public function mostrarChekins(Request $request)
    {
        $checkins = Chekin::all()->where('idAluno', $request->get('idAluno'));
        $dados = [];
        foreach ($checkins as $item) {
            array_push($dados, TreinoAmistoso::find($item->idTreino));
        }
        return response()->json([
            'dados' => $dados
        ]);
    }


}
