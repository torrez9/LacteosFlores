@extends('adminlte::page')

@section('title', 'Devolución con Detalles')

@section('content_header')
    <h1 style="color: #3498db;">Reporte de Devoluciones con Detalles</h1>
@stop

@section('content')
    <form action="{{ route('reportedevolucioncondetalles') }}" method="GET" id="reporteForm">
        <div class="card">
            <div class="card-header" style="background-color: #3498db; color: white; border-top-left-radius: 8px; border-top-right-radius: 8px; padding: 10px;">
                <h3 class="card-title">Reporte de las Devoluciones</h3>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="fecha_inicio">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $fecha_inicio ?? '' }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fecha_fin">Fecha de fin:</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $fecha_fin ?? '' }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="search_id_devolucion">Buscar por ID de Devolución:</label>
                        <input type="text" class="form-control" id="search_id_devolucion">
                    </div>
                    <div class="form-group col-md-3" style="padding-top: 30px;">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        <a href="{{ route('reportedevolucioncondetalles') }}" class="btn btn-secondary">Limpiar</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="devolucioncondetalles" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID Devolución</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Motivo</th>
                                <th>ID Detalle</th>
                                <th>Acciones</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportes as $reporte)
                            <tr>
                                <td>{{ $reporte->id_devolucion }}</td>
                                <td>{{ $reporte->producto_descripcion }}</td>
                                <td>{{ $reporte->fechadevolucion }}</td>
                                <td>{{ $reporte->motivodevolucion }}</td>
                                <td>{{ $reporte->id_detalledevs }}</td>
                                <td>{{ $reporte->accionestomada }}</td>
                                <td>{{ $reporte->cantidad }}</td>
                                <td>C$ {{ number_format($reporte->precio, 2) }}</td>
                                <td>C$ {{ number_format($reporte->cantidad * $reporte->precio, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background-color: #f2f2f2; color: #333; font-weight: bold;">
                                <td colspan="8" style="text-align:right">Total:</td>
                                <td id="total_devolucion">C$ {{ number_format($reportes->sum(function($item) { return $item->cantidad * $item->precio; }), 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $reportes->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="imprimirButton" class="btn btn-primary float-right" formaction="{{ route('reportdevolucioncondetalles') }}" formtarget="_blank">
                    <i class="fas fa-print"></i> Imprimir PDF
                </button>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" />
    <!-- Estilos CSS... (mantener los mismos estilos) -->
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#devolucioncondetalles').DataTable({
                "paging": false,
                "info": false,
                "searching": true,
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api();
                    var total = api.column(8, { page: 'current' }).data()
                                .reduce(function(a, b) {
                                    return parseFloat(a.replace(/[^0-9.]/g, '')) + parseFloat(b.replace(/[^0-9.]/g, ''));
                                }, 0);
                    
                    $('#total_devolucion').html('C$ ' + total.toFixed(2));
                }
            });

            // Buscador por ID de Devolución
            $('#search_id_devolucion').on('keyup', function() {
                table.column(0).search(this.value).draw();
            });

            // Función para agregar el filtro por fecha a DataTables
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var fecha_inicio = $('#fecha_inicio').val();
                    var fecha_fin = $('#fecha_fin').val();
                    var fecha_devolucion = data[2]; // Índice 2 corresponde a la columna de fecha

                    if (fecha_inicio === '' || fecha_fin === '') {
                        return true;
                    }

                    var fechaDevolucion = new Date(fecha_devolucion);
                    var inicio = new Date(fecha_inicio);
                    var fin = new Date(fecha_fin);
                    fin.setDate(fin.getDate() + 1); // Añadir un día para incluir el día final

                    return fechaDevolucion >= inicio && fechaDevolucion <= fin;
                }
            );

            // Aplicar el filtro al cambiar las fechas
            $('#fecha_inicio, #fecha_fin').change(function() {
                table.draw();
            });

            // Inicializar el total al cargar la página
            var initialTotal = table.column(8).data().reduce(function(a, b) {
                return parseFloat(a.replace(/[^0-9.]/g, '')) + parseFloat(b.replace(/[^0-9.]/g, ''));
            }, 0);
            $('#total_devolucion').html('C$ ' + initialTotal.toFixed(2));
        });
    </script>
@stop