<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidade extends Model
{
    use HasFactory;
    protected $table = 'modalidades';
    protected $primaryKey = 'idModalidade';
    protected $fillable = ['nome'];

    public function Time()
    {
        #A tabela 'Modalidade' envia o idModalidade para a tabela 'Time' para poder fazer a relação
        return $this->belongsTo(Time::class);
    }

    public function TreinoAmistoso()
    {
        #A tabela 'Modalidade' envia o idModalidade para a tabela 'TreinoAmistoso' poder fazer a relação
        return $this->belongsTo(TreinoAmistoso::class);
    }
}
