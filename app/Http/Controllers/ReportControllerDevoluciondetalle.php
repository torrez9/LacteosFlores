<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detalledevolucion1; // Usamos el modelo de la vista
use Barryvdh\DomPDF\Facade\Pdf;

class ReportControllerDevoluciondetalle extends Controller
{
    public function indexdevolucioncondetalles(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = detalledevolucion1::query();

        // Filtrar por rango de fechas si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('fechadevolucion', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('fechadevolucion', 'desc')->get();

        return view('Reportes.devolucioncondetalles', compact('reportes', 'fecha_inicio', 'fecha_fin'));
    }

    public function devolucioncondetallePdf(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $query = detalledevolucion1::query();

        if ($fecha_inicio && $fecha_fin) {
            $query->whereBetween('fechadevolucion', [$fecha_inicio, $fecha_fin]);
        }

        $reportes = $query->orderBy('fechadevolucion', 'desc')->get();
        
        $pdf = PDF::loadView('Reportes.devolucioncondetallesPdf', [
            'reportes' => $reportes,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin
        ]);

        return $pdf->stream('reporte_devoluciones_detalles.pdf');
    }
}