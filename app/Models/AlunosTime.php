<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunosTime extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAlunosTimes';
    public function Aluno()
    {
        #A tabela 'AlunosTimes' recebe o idAluno para poder fazer a relação
        return $this->hasOne(Aluno::class, 'idAluno');
    }

    public function Time()
    {
        #A tabela 'AlunosTimes' recebe o idTime para poder fazer a relação
        return $this->hasOne(Time::class, 'idTime');
    }

}
