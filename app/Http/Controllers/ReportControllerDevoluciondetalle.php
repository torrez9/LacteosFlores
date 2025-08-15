<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devoluciones;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportControllerDevoluciondetalle extends Controller
{
    public function indexdevolucioncondetalles(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = Devoluciones::select(
                'devoluciones.id_devolucion',
                'devoluciones.fechadevolucion',
                'devoluciones.motivodevolucion',
                'devoluciones.accionestomada',
                'devoluciones.totaldevolucion',
                'productos.descripcion as producto_descripcion',
                'detalledevolucions.id_detalledevs',
                'detalledevolucions.cantidadD as cantidad',
                'detalledevolucions.precio'
            )
            ->join('detalledevolucions', 'devoluciones.id_devolucion', '=', 'detalledevolucions.iddevolucion')
            ->join('productos', 'detalledevolucions.idproducto', '=', 'productos.id_producto');

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('devoluciones.fechadevolucion', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('devoluciones.fechadevolucion', 'desc')
            ->paginate(15)
            ->appends($request->query());

        return view('Reportes.devolucioncondetalles', compact('reportes', 'fecha_inicio', 'fecha_fin'));
    }

    public function devolucioncondetallePdf(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = Devoluciones::select(
                'devoluciones.id_devolucion',
                'devoluciones.fechadevolucion',
                'devoluciones.motivodevolucion',
                'devoluciones.accionestomada',
                'devoluciones.totaldevolucion',
                'productos.descripcion as producto_descripcion',
                'detalledevolucions.id_detalledevs',
                'detalledevolucions.cantidadD as cantidad',
                'detalledevolucions.precio'
            )
            ->join('detalledevolucions', 'devoluciones.id_devolucion', '=', 'detalledevolucions.iddevolucion')
            ->join('productos', 'detalledevolucions.idproducto', '=', 'productos.id_producto');

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('devoluciones.fechadevolucion', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('devoluciones.fechadevolucion', 'desc')->get();

        $pdf = Pdf::loadView('Reportes.devolucioncondetallesPdf', compact('reportes', 'fecha_inicio', 'fecha_fin'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_devoluciones_' . now()->format('YmdHis') . '.pdf');
    }
}