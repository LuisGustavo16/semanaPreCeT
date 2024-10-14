<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAluno';
    protected $fillable = ['CPF', 'nome', 'dtNascimento', 'matricula', 'RG', 'turma', 'curso'];

    public function Chekin()
    {
        #A tabela 'alunos' manda o idAluno para a tabela 'chekins' para poder fazer a relação
        return $this->belongsTo(Chekin::class);
    }

    public function AlunosTime()
    {
        #A tabela 'alunos' manda o idAluno para a tabela 'AlunosTimes' para poder fazer a relação
        return $this->belongsTo(AlunosTime::class);
    }

    public function Reserva()
    {
        #A tabela 'alunos' manda o idAluno para a tabela 'reservas' para poder fazer a relação
        return $this->belongsTo(Reserva::class);
    }

    public function SolicitacaoReserva()
    {
        #A tabela 'alunos' manda o idAluno para a tabela 'SolicitacaoReserva' para poder fazer a relação
        return $this->belongsTo(SolicitacaoReserva::class);
    }
}
