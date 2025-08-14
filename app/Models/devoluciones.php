<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devoluciones extends Model
{
    use HasFactory;

    protected $table = 'devoluciones';
    protected $primaryKey = 'id_devolucion';

    protected $fillable = [
        'fechadevolucion',
        'totaldevolucion',
        'motivodevolucion',
        'accionestomada',
        'idfactura'
    ];

    // Relación con Factura
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'idfactura');
    }

    // Relación con Detalles de Devolución
    public function detalles()
    {
        return $this->hasMany(DetalleDevolucion::class, 'iddevolucion');
    }

    // Relación con Productos a través de DetalleDevolucion
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalledevolucions', 'iddevolucion', 'idproducto')
                    ->withPivot('cantidadD', 'precio')
                    ->withTimestamps();
    }
}