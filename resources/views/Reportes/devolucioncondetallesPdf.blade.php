<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Devoluciones con Detalles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #3498db;
            margin-bottom: 5px;
        }
        .header p {
            margin: 0;
            color: #555;
        }
        .fechas {
            margin-bottom: 15px;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 8px;
            text-align: left;
        }
        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
            text-align: right;
            padding: 10px;
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reporte de Devoluciones con Detalles</h1>
        <p>Sistema de Gestión de Lácteos</p>
    </div>

    @if($fecha_inicio && $fecha_fin)
    <div class="fechas">
        <strong>Período:</strong> {{ \Carbon\Carbon::parse($fecha_inicio)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($fecha_fin)->format('d/m/Y') }}
    </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID Devolución</th>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Motivo</th>
                <th>Acciones</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalGeneral = 0;
            @endphp
            @foreach($reportes as $reporte)
            <tr>
                <td>{{ $reporte->id_devolucion }}</td>
                <td>{{ $reporte->producto_descripcion }}</td>
                <td>{{ \Carbon\Carbon::parse($reporte->fechadevolucion)->format('d/m/Y') }}</td>
                <td>{{ $reporte->motivodevolucion }}</td>
                <td>{{ $reporte->accionestomada }}</td>
                <td>{{ $reporte->cantidad }}</td>
                <td>C$ {{ number_format($reporte->precio, 2) }}</td>
                <td>C$ {{ number_format($reporte->cantidad * $reporte->precio, 2) }}</td>
            </tr>
            @php
                $totalGeneral += $reporte->cantidad * $reporte->precio;
            @endphp
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="total">Total General:</td>
                <td class="total">C$ {{ number_format($totalGeneral, 2) }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        Generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>