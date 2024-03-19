<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaga extends Model
{
    protected $table = "plagas";
    protected $fillable = ['periodo_carencia', 'producto_control_id'];

    // Relación inversa con ProductoControl
    public function productoControl()
    {
        return $this->belongsTo(ProductoControl::class);
    }
}
