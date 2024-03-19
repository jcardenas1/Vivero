<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoControl extends Model
{
    protected $table = "productos_control";
    protected $fillable = [
        'registro_ica',
        'nombre_producto',
        'frecuencia_aplicacion',
        'valor_producto',
    ];

    public function labor()
    {
        return $this->belongsToMany(Labor::class);
    }

    public function plagas()
    {
        return $this->hasMany(Plaga::class);
    }

    public function hongos()
    {
        return $this->hasMany(Hongo::class);
    }

    public function fertilizantes()
    {
        return $this->hasMany(Fertilizante::class);
    }
}
