<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['id', 'nombre', 'apellidos', 'dni', 'f_nac', 'correo', 'direccion'];

    public function getAgeAttribute(){
        return Carbon::parse($this->attributes['f_nac'])->age;
    }

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);

    }

}
