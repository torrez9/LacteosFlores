<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detallecompras';
    protected $primaryKey = 'id_detallecompra'; // sin espacio extra

    protected $fillable = [
        'idcompra',
        'idproducto',
        'cantidad',
        'precio',
        'importe',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'idcompra');
    }
}
