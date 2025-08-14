<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturacioncondetalles; // ✅ Asegúrate de que este modelo exista
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;

class ReportControllerFacturacionDetalle extends Controller
{
    public function indexfacturaciondetalle(Request $request): View
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        // Obtener los reportes filtrados por fecha si se especificaron
        if ($fecha_inicio && $fecha_fin) {
            $reportes = facturacioncondetalles::whereBetween('fecha_factura', [$fecha_inicio, $fecha_fin])->get();
        } else {
            // Si no se especifican fechas, obtener todos los reportes
            $reportes = facturacioncondetalles::all();
        }

        return view('Reportes.facturaciondetalle', compact('reportes'));
    }

    public function facturaciondetallepdf()
    {
        $reportes = facturacioncondetalles::all();

        // Generar el PDF en formato horizontal
        $pdf = Pdf::loadView('Reportes.facturaciondetallePdf', compact('reportes'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_facturaciondetalle.pdf');
    }
}
