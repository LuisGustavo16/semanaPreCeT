<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
use App\Models\Reserva;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class NoticiaController extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function index()
    {
        $dados = Noticia::all();
        /*Passa o formato da hora do BD para hora:minuto*/
        foreach ($dados as $item) {
            $item->horario = Carbon::parse($item->horario)->timezone('America/Sao_Paulo')->format('H:i'); 
            $item->dia = Carbon::parse($item->dia)->format('d/m');
        }
        return response()->json([
            'dados' => $dados,
        ]);
    }


}