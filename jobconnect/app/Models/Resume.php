<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario_id',
        'nome_completo',
        'data_nascimento',
        'telefone',
        'endereco',
        'nacionalidade',
        'estado_civil',
        'link_linkedin',
        'link_portfolio',
        'habilidades',
        'idiomas',
        'cursos',
    ];

    /**
     * Os atributos que devem ser convertidos em tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'habilidades' => 'array',
        'idiomas' => 'array',
        'cursos' => 'array',
    ];

    /**
     * Relacionamento com o modelo de usuário.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
