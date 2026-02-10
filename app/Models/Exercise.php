<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\HasMany;

class Exercise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $dates = ['deleted_at'];

    public function muscles()
    {
        return $this->belongsToMany(Muscle::class, 'exercise_muscle');
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class, 'exercise_material');
    }
}

