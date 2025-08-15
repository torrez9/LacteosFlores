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
        'cantidadD',
        'precio',
        'idproducto',
        'iddevolucion'
    ];

    // Relación con Devolución
    public function devolucion()
    {
        return $this->belongsTo(Devoluciones::class, 'iddevolucion', 'id_devolucion');
    }

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto', 'id_producto');
    }
}