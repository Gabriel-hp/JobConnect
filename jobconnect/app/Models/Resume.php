<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'nome_completo', 'data_nascimento', 'telefone', 'endereco', 
        'nacionalidade', 'estado_civil', 'link_linkedin', 'link_portfolio'
    ];

    // Relacionamento com experiências
    public function experiences()
    {
        return $this->hasMany(ProfessionalExperience::class);
    }

    // Relacionamento com educação
    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    // Relacionamento com habilidades
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    // Relacionamento com idiomas
    public function languages()
    {
        return $this->hasMany(Language::class);
    }
}
