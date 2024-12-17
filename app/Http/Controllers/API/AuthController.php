<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\User;
use App\Traits\ApiResponse;
use Carbon\Carbon;
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
        // Validação dos campos obrigatórios na requisição
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar o aluno pelo e-mail
        $user = Aluno::where('email', $request->email)->first();

        // Verificar se o aluno foi encontrado e a senha é válida
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->error('Dados de autenticação inválidos!!!', 401);
        }

        // Gerar o token de autenticação
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
                'dtNascimento' => Carbon::parse($user->dataNascimento)->format('d/m/y'),
                'matricula' => $user->matricula,
                'genero' => $user->genero,
                'tipo' => $user->tipo
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
