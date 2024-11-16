<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;

class ReservasController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function store(Request $request) {
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
        return $this->error("Erro ao registrar a presença!!!", 401, $th->getMessage());
    }
    }

    public function index()
    {
        $dados = Reserva::all();
        foreach ($dados as $item) {
            /*Trocar o formato do dia e do horário*/
            $item->dia = Carbon::parse($item->dia)->format('d/m');
            $item->horarioInicio = Carbon::parse($item->horarioInicio)->format('h:m');
            $item->horarioFim = Carbon::parse($item->horarioFim)->format('h:m');
            $nome = User::find($item->idAluno);
            $item->nomeAluno = $nome->name;
        }
        return response()->json([
            'dados' => $dados,
        ]);
    }
}
