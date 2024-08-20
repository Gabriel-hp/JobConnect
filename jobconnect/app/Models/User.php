<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'senha', 'tipo'];

    public function resumes()
    {
        return $this->hasMany(Resume::class);
    }
}
