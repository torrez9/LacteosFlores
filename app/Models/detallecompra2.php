<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detallecompra2 extends Model
{
    use HasFactory;
    protected $table = 'compra_con_detalles'; // Vista de la BD
    
    // Campos que pueden ser llenados
    protected $fillable = [
        'id_compra',
        'fechacompra',
        'proveedor',
        'usuario',
        'Total',
        'id_detallecompra',
        'idproducto',
        'producto',
        'cantidad',
        'precio',
        'importe'
    ];
    
    // Deshabilitar timestamps si no existen en la vista
    public $timestamps = false;
}