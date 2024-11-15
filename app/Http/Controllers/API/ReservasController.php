<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;

class ReservasController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function store(Request $request)
    {
        try {
        $dados = Reserva::create([
            'idAluno' => $request->get('idAluno'),
            'dia' => $request->get('dia'),
            'horarioInicio' => $request->get('horarioInicio'),
            'horarioFim' => $request->get('horarioFim'),
            'finalidade' => $request->get('finalidade'),
            'status' => $request->get('status'),
            'tipo' => $request->('tipo'),
            'numeroPessoas' => $request->get('numeroPessoas'),
        ]);
            return $this->success([], "Cadastro realizado com sucesso!!!");
        } catch (\Throwable $th) {
                return $this->error("Erro ao registrar a presença!!!", 401, $th->getMessage());
            }
    }

    public function index() {
        $dados = Reserva::all();
        return response()->json([
            'dados' => $dados,
    ]);
}


}
