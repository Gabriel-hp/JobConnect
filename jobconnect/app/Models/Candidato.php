<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'user_id',        // Inclua o user_id para garantir que ele possa ser atribuído em massa
        'telefone',
        'endereco',
        'experiencia',
        'escolaridade',
        'curriculo',
    ];

    // Um candidato pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vagas()
    {
        return $this->belongsToMany('App\Models\Vaga', 'candidato_vaga', 'candidato_id', 'vaga_id');
    }

    public function candidaturas()
    {
        return $this->hasMany('App\Models\Candidatura', 'candidato_id');
    }
    
}
