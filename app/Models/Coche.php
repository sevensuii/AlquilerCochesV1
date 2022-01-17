<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coche extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['id', 'marca', 'modelo', 'matricula', 'combustible', 'observaciones'];



    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);
    }
}
