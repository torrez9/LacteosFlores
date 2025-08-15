<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleFactura;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportControllerProductosmasvendidos extends Controller
{
    public function indexproductomasvendidos(Request $request)
    {
        $query = DetalleFactura::select(
                'productos.id_producto',
                'productos.descripcion',
                \DB::raw('SUM(detallefacturas.cantidad) as cantidad_vendida'),
                \DB::raw('SUM(detallefacturas.importe) as total_importe')
            )
            ->join('productos', 'detallefacturas.idproducto', '=', 'productos.id_producto')
            ->join('facturas', 'detallefacturas.idfactura', '=', 'facturas.id_factura')
            ->where('facturas.estado', '!=', 'Anulada')
            ->groupBy('productos.id_producto', 'productos.descripcion')
            ->orderBy('cantidad_vendida', 'desc');

        $reportes = $query->paginate(15);

        return view('Reportes.productosmasvendidos', compact('reportes'));
    }

    public function productosmasvendidosPdf(Request $request)
    {
        $reportes = DetalleFactura::select(
                'productos.id_producto',
                'productos.descripcion',
                \DB::raw('SUM(detallefacturas.cantidad) as cantidad_vendida'),
                \DB::raw('SUM(detallefacturas.importe) as total_importe')
            )
            ->join('productos', 'detallefacturas.idproducto', '=', 'productos.id_producto')
            ->join('facturas', 'detallefacturas.idfactura', '=', 'facturas.id_factura')
            ->where('facturas.estado', '!=', 'Anulada')
            ->groupBy('productos.id_producto', 'productos.descripcion')
            ->orderBy('cantidad_vendida', 'desc')
            ->get();

        $pdf = Pdf::loadView('Reportes.productosmasvendidosPdf', compact('reportes'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('productos_mas_vendidos_' . now()->format('YmdHis') . '.pdf');
    }
}