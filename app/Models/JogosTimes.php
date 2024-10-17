<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JogosTimes extends Model
{
    use HasFactory;
    protected $primaryKey = 'idJogoTime';
    protected $fillable = ['idTime', 'horario', 'dia', 'local', 'horarioInicio', 'horarioFim', 'status', 'tipo', 'observacao', 'numeroPessoas'];

    public function Modalidade()
    {
        return $this->hasOne(Time::class, 'idTime');
    }
}
