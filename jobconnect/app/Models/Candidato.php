<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cidade',
        'experiencia',
        'escolaridade',
        'curriculo',
        'vaga_id', // Para armazenar a vaga à qual o candidato se candidatou
    ];

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }
}
