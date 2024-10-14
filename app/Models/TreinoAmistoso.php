<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreinoAmistoso extends Model
{
    use HasFactory;
    protected $table = 'treino_amistosos';
    protected $primaryKey = 'idTreino';
    protected $fillable = ['dia', 'horario', 'genero', 'publico', 'local', 'responsavel', 'observacao'];

    public function Chekin()
    {
        #A tabela 'TreinoAmistoso' envia o idTreino para a tabela 'Chekin' para poder fazer a relação
        return $this->belongsTo(Chekin::class);
    }

    public function Modalidade()
    {
        #A tabela 'TreinoAmistoso' recebe o idModalidade para poder fazer a relação
        return $this->hasOne(Modalidade::class, 'idModalidade');
    }


}
