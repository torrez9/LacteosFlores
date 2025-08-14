<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detallecompra2; // Usamos el modelo de la vista
use Barryvdh\DomPDF\Facade\Pdf;

class ReportControllerCompraDetalle extends Controller
{
    public function indexCompracondetalles(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = detallecompra2::query();

        // Filtrar por rango de fechas si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('fechacompra', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('fechacompra', 'desc')->get();

        return view('Reportes.compracondetalles', compact('reportes', 'fecha_inicio', 'fecha_fin'));
    }

    public function compracondetallesPdf(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = detallecompra2::query();

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('fechacompra', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('fechacompra', 'desc')->get();
        
        $pdf = PDF::loadView('Reportes.compracondetallesPdf', [
            'reportes' => $reportes,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_compras_detalles.pdf');
    }
}