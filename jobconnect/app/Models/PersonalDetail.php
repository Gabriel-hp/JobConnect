<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = ['resume_id', 'nome_completo', 'data_nascimento', 'telefone', 'endereco', 'nacionalidade', 'estado_civil', 'link_linkedin', 'link_portfolio'];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
