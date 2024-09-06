<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    // Lista de atributos que podem ser preenchidos em massa
    protected $fillable = [
        'titulo',
        'descricao',
        'cidade',
        'nome_empresa',
        'regime_contratacao',
        'pcd',
        'modalidade_trabalho',
        'area',
        'escolaridade',
        'salario',
        'beneficios',
        'admin_id',
    ];
    public function candidaturas()
    {
        return $this->hasMany(Candidatura::class);
    }
}
