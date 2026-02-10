<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\HasMany;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =[];
    protected $dates = ['deleted_at'];

    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'customer_trainer');
    }
}

