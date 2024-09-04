<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidatura extends Model
{
    public function candidato()
    {
        return $this->belongsTo(Candidato::class);
    }

    public function vaga()
    {
        return $this->belongsTo(Vaga::class);
    }
}
