<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $primaryKey = 'idReserva';
    protected $fillable = ['idAluno', 'finalidade', 'dia', 'local', 'horarioInicio', 'horarioFim', 'status', 'tipo', 'observacao'];

    public function Aluno()
    {
        #A tabela 'Reserva' recebe o idAluno para poder fazer a relação
        return $this->hasOne(Aluno::class, 'idAluno');
    }
}
