<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'titulo'];

    public function personalDetail()
    {
        return $this->hasOne(PersonalDetail::class);
    }

    public function professionalExperience()
    {
        return $this->hasMany(ProfessionalExperience::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }

    public function language()
    {
        return $this->hasMany(Language::class);
    }
}
