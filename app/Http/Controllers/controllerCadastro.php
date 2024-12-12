<?php

namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Modalidade;
use Hash;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Time;
use App\Models\AlunosTime;
use Laravel\Sanctum\HasApiTokens;
use Validator;

class controllerCadastro extends Controller
{
    use ApiResponse;
    use HasApiTokens;
    public function registerInicio(Request $request)
    {
        try {
            $validatedData = Validator::make($request->all(), [
                'name' => 'required|string|max:255|unique:alunos',
                'email' => 'required|string|max:255|unique:alunos',
                'password' => 'required|string',
            ]);
            if ($validatedData->fails()) {
                return redirect()->route("CadastrarInicio");
            }
            if ($request->get('tipo_usuario') == "professor") {
                $user = Aluno::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'tipo' => "professor",
                    'status' => 'espera',
                    'password' => Hash::make($request->get('password')),
                ]);
                return view("Cadastro/telaEspera");

            } else if ($request->get('tipo_usuario') == "aluno_graduacao") {
                $user = [
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'tipo' => "Professor",
                    'status' => 'espera',
                    'password' => Hash::make($request->get('password')),
                ];
                return view("Cadastro/cadastrarUniversitario", compact("user"));

            } else if ($request->get('tipo_usuario') == "aluno_tecnico") {
                $user = ([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                ]);
                return view("Cadastro/cadastrarAluno", compact("user"));
            }
        } catch (\Throwable $th) {
            return redirect()->route("CadastrarInicio");
        }
    }

    public function registerAluno(Request $request)
    {
        $user = Aluno::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'turma' => $request->get('turma'),
            'curso' => $request->get('curso'),
            'matricula' => $request->get('matricula'),
            'descricaoEsportiva' => "",
            'dataNascimento' => $request->get('dtNascimento'),
            'genero' => $request->get('genero'),
            'tipo' => "Aluno",
            'status' => 'espera',
        ]);
        return redirect()->route("telaEspera");
    }

    public function registerUniversitario(Request $request)
    {
            $user = Aluno::create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'curso' => $request->get('curso'),
                'tipo' => "Universitário",
                'status' => 'espera',
                'matricula' => $request->get('matricula'),
            ]);
            return redirect()->route("telaEspera");
    }

}
