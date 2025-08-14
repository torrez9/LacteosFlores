<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productomascomprados extends Model
{
    use HasFactory;
    
    protected $table = 'productos_mas_vendidos'; // Nombre de la vista en la BD
    
    protected $fillable = [
        'id_producto',
        'descripcion',
        'total_vendido',
        'veces_vendido',
        'total_importe_vendido',
        'proveedor'
    ];
    
    // Deshabilitar timestamps si no existen en la vista
    public $timestamps = false;
}
