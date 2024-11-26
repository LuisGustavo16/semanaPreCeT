<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'turma',
        'curso',
        'matricula',
        'descricaoEsportiva',
        'tipo',
        'status',
        'genero',
        'dataNascimento'
    ];

    public function Reserva()
    {
        #A tabela 'users' manda o id para a tabela 'reservas' para poder fazer a relação
        return $this->belongsTo(Reserva::class);
    }

    public function Chekin()
    {
        #A tabela 'users' manda o id para a tabela 'chekins' para poder fazer a relação
        return $this->belongsTo(Chekin::class);
    }

    public function AlunosTime()
    {
        #A tabela 'users' manda o idAluno para a tabela 'AlunosTimes' para poder fazer a relação
        return $this->belongsTo(AlunosTime::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
