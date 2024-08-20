<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalExperience extends Model
{
    protected $fillable = [
        'cargo', 'empresa', 'data_inicio', 'data_fim', 
        'descricao_responsabilidades', 'localizacao'
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
