<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory, Notifiable;
    use HasApiTokens;
    protected $fillable = ['name', 'email', 'password', 'turma', 'curso', 'matricula', 'descricaoEsportiva', 'tipo', 'status', 'genero', 'dataNascimento'];

    public function Reserva()
    {
        #A tabela 'alunos' manda o id para a tabela 'reservas' para poder fazer a relação
        return $this->belongsTo(Reserva::class);
    }

    public function Chekin()
    {
        #A tabela 'alunos' manda o id para a tabela 'chekins' para poder fazer a relação
        return $this->belongsTo(Chekin::class);
    }

    public function AlunosTime()
    {
        #A tabela 'alunos' manda o idAluno para a tabela 'AlunosTimes' para poder fazer a relação
        return $this->belongsTo(AlunosTime::class);
    }
}
