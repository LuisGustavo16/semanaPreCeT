<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JogosTimes extends Model
{
    use HasFactory;
    protected $primaryKey = 'idJogoTime';
    protected $fillable = ['idTime', 'horarioInicio', 'horarioFim', 'dia', 'local', 'horarioInicio', 'horarioFim', 'status', 'tipo', 'observacao', 'numeroPessoas'];

    public function Time()
    {
        return $this->hasOne(Time::class, 'idTime');
    }
}
