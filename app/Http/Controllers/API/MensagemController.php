<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Mensagem;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class MensagemController extends Controller
{
    use ApiResponse;
    use HasApiTokens;

    public function index(Request $request)
    {
        $mensagens = Mensagem::where('idAluno', $request->idAluno)->orderBy('dia')->get();
        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($mensagens as $item) {
            $item->horario = Carbon::parse($item->horario)->timezone('America/Sao_Paulo')->format('H:i'); 
            $item->dia = Carbon::parse($item->dia)->format('d/m');
        }
        return response()->json([
            'mensagens' => $mensagens,
        ]);
    }


}
