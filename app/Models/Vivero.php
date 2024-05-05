<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivero extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * 
    */
    protected $table = "viveros";
    protected $fillable = [
        'nombre',
        'codigo',
        'tipo_cultivo',
        'finca_id',
        'productor_id'
    ];

    public function finca() {
        return $this->belongsTo(Finca::class);
    }

    public function productor() {
        return $this->belongsTo(Productor::class);
    }

    public function labores()  {
        return $this->hasMany(Labor::class);
    }
}
