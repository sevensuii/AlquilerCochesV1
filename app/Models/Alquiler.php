<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alquiler extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'alquileres';

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function coche()
    {
        return $this->belongsTo(Coche::class);
    }
}
