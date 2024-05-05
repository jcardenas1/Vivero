<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finca extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * 
    */
    protected $table = "fincas";
    protected $fillable = [
        'nombre',
        'numero_catastro',
        'municipio',
        'productor_id'
    ];

    public function productor() {
        return $this->belongsTo(Productor::class);
    }

    public function viveros(){
        return $this->hasMany(Vivero::class);
    }
}
