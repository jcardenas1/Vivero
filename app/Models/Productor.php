<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * 
    */
    protected $table = "productores";
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'created_at',
        'updated_at'
    ];

    public function fincas(){
        return $this->hasMany(Finca::class);
    }

    public function viveros(){
        return $this->hasMany(Vivero::class);
    }
}
