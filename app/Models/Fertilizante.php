<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizante extends Model
{
    protected $table = "fertilizantes";
    protected $fillable = ['fecha_aplicacion', 'producto_control_id'];

    // Relación inversa con ProductoControl
    public function productoControl()
    {
        return $this->belongsTo(ProductoControl::class);
    }
    
}
