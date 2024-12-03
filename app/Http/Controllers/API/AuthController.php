<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;
use Iluminate\Foundation\Auth\User as Authenticatable;
class AuthController extends Controller
{
    use ApiResponse;
    use HasApiTokens;

    public function login(Request $request)
    {
        try {
            /*if (!Auth::attempt($request->only('email', 'password'))) {
                return $this->error('Dados de autenticação inválidos!!!', 401);
            }*/
            $user = Aluno::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('token-name')->plainTextToken;
            $expiresAt = now()->addHours(3);
            return $this->success([
                'token' => $token,
                'expires_at' => $expiresAt,
                'email' => $user->email,
                'status' => $user->status,
                'id' => $user->id,
                'name' => $user->name,
                'descricaoEsportiva' => $user->descricaoEsportiva,
                'curso' => $user->curso,
                'turma' => $user->turma,
                'dtNascimento' => $user->dataNascimento,
                'matricula' => $user->matricula,
                'genero' => $user->genero
            ], "Login realizado!!!");

        } catch (\Throwable $th) {
            return $this->error("Falha ao realizar o login!!!", 401, $th->getMessage());
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->success(null, "Até a próxima!!!");
        } catch (\Throwable $th) {
            return $this->error("Falha ao realizar o logout!!!", 401, $th->getMessage());
        }
    }

    public function gerarSenhaADM (Request $request) {
        $senha = Hash::make($request->get('senha'));
        return $senha;
    }
}
