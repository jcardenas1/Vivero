<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * 
    */
    protected $table = "labores";
    protected $fillable = [
        'fecha_realizacion',
        'descripcion',
        'vivero_id'
    ];

    public function vivero() {
        return $this->belongsTo(Vivero::class);
    }

    public function productoscontrol(){
        return $this->belongsToMany(ProductoControl::class);
    }
}
