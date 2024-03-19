<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hongo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * 
    */
    protected $table = "hongos";
    protected $fillable = ['periodo_carencia', 'nombre_hongo', 'producto_control_id'];

    // Relación inversa con ProductoControl
    public function productoControl()
    {
        return $this->belongsTo(ProductoControl::class);
    }
    
}
