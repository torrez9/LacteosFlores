<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDevolucion extends Model
{
    use HasFactory;

    protected $table = 'detalledevolucions';
    protected $primaryKey = 'id_detalledevs';

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

    // Relación con Devolución
    public function devolucion()
    {
        return $this->belongsTo(Devoluciones::class, 'iddevolucion');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto');
    }
}