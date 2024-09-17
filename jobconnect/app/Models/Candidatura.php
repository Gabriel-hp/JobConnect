<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    use HasFactory;

    // Define os campos que podem ser preenchidos
    protected $fillable = [
        'candidato_id',
        'vaga_id',
        // Outros campos conforme necessário
    ];


    public function vaga()
    {
        return $this->belongsTo('App\Models\Vaga', 'vaga_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function candidato()
{
    return $this->belongsTo(User::class, 'candidato_id');
}

    


}
