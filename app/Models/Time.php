<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $primaryKey = 'idTime';
    protected $fillable = ['genero', 'competicao'];

    public function AlunosTime()
    {
        #A tabela 'Time' envia o idTime para a tabela 'AlunosTimes' para poder fazer a relação
        return $this->belongsTo(AlunosTime::class);
    }

    public function Modaliade()
    {
        #A tabela 'Time' recebe o idModalidade para poder fazer a relação
        return $this->hasOne(Modalidade::class, 'idModalidade');
    }
}
