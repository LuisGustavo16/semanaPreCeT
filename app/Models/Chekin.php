<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chekin extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCheckin';
    protected $fillable = ['idAluno', 'idTreino'];
    
    public function Aluno()
    {
        #A tabela 'Chekin' recebe o idAluno para poder fazer a relação
        return $this->hasOne(Aluno::class, 'idAluno');
    }

    public function TreinoAmistoso()
    {
        #A tabela 'Chekin' recebe o idTreino para poder fazer a relação
        return $this->hasOne(TreinoAmistoso::class, 'idTreino');
    }
}
