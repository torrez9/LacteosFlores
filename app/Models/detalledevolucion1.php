<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalledevolucion1 extends Model
{
    use HasFactory;
    protected $table = 'devolucion_con_detalles'; // Vista de la BD
    
    protected $fillable = [
        'iddevolucion',
        'fechadevolucion',
        'totaldevolucion',
        'motivodevolucion',
        'accionestomada',
        'idfactura',
        'id_detalledevs',
        'idproducto',
        'producto',
        'cantidad',
        'precio',
        'importe_devolucion'
    ];
    
    public $timestamps = false;
}