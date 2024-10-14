<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoReserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'idSolicitacaoReserva';
    protected $fillable = ['idAluno', 'finalidade', 'dia', 'local', 'horarioInicio', 'horarioFim'];

    public function Aluno()
    {
        #A tabela 'SolicitacaoReserva' recebe o idAluno para poder fazer a relação
        return $this->hasOne(Aluno::class, 'idAluno');
    }
}
