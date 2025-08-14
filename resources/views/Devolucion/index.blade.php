@extends('adminlte::page')

@section('title', 'Devolución')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Registro de Devoluciones</h1>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda">Ayuda</button>
</div>
@stop

@section('content')
<div class="container-fluid p-0 h-100 d-flex flex-column">
    <div class="flex-grow-1 d-flex flex-column">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos de Devolución</h3>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" id="searchInvoice" class="form-control" placeholder="Buscar Factura...">
                            <div class="input-group-append">
                                <button id="searchInvoice1" class="btn btn-success">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fechadevolucion">Fecha Devolución</label>
                            <input type="date" class="form-control" id="fechadevolucion" name="fechadevolucion" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white;">
                                    <tr>
                                        <th class="text-center">N° Factura</th>
                                        <th class="text-center">Fecha Venta</th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="NumFactura" class="text-center"></td>
                                        <td id="fechafactura" class="text-center"></td>
                                        <td id="totalfactura" class="text-right"></td>
                                        <td id="estado" class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="motivodevolucion1">Motivo Anulación</label>
                            <select class="form-control" id="motivodevolucion1" name="estado" disabled>
                                <option>Anular por error</option>
                                <option>Anular por devolución</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="motivodevolucion">Detalle del Motivo</label>
                            <textarea id="motivodevolucion" class="form-control" name="motivodevolucion" rows="2" disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label for="accionestomada">Acciones Tomadas</label>
                            <input type="text" class="form-control" id="accionestomada" name="accionestomada" disabled>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="table-responsive" style="max-height: 300px;">
                            <table class="table table-bordered table-hover table-sm">
                                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white; position: sticky; top: 0; z-index: 1;">
                                    <tr>
                                        <th class="text-center">ID Producto</th>
                                        <th class="text-center">Cantidad</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="detallesTableBody1"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="button-container">
                            <button id="Anularfact" class="btn btn-info btn-sm mr-2">Anular Factura</button>
                            <button id="btnCancelar" class="btn btn-danger btn-sm">Cancelar</button>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="form-group d-inline-block">
                            <label class="total-label">Total Devolución:</label>
                            <input type="text" id="total" class="form-control form-control-sm" style="width: 150px;" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana emergente (modal) -->
<div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('images/ayuda/devolucion.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="idusuario" name="idusuario" value="{{Auth::id()}}">
<input type="hidden" id="iddevolucion" value="{{ $nuevoId }}">
@stop

@section('css')
<style>
    :root {
        --primary-color: #2e6da4;
        --secondary-color: #4dabf7;
        --text-color: #333;
        --light-gray: #f8f9fa;
    }

    body {
        background-color: var(--light-gray);
    }

    .content-wrapper {
        height: 100%;
    }

    /* Estilos para la tabla */
    table {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 0;
    }
    
    th {
        font-weight: 600;
        padding: 12px 8px;
        position: sticky;
        top: 0;
        background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        z-index: 10;
    }
    
    td {
        padding: 10px 8px;
        vertical-align: middle;
    }

    /* Scrollbar personalizada */
    .table-responsive::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    .table-responsive::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    
    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .button-container {
        display: flex;
        gap: 10px;
    }

    .total-label {
        margin-right: 10px;
        font-weight: 600;
        color: var(--primary-color);
    }

    .card-header {
        background-color: var(--secondary-color);
        color: white;
    }

    /* Manteniendo los estilos del menú lateral como en tu diseño original */
    .sidebar-dark-primary {
        background-color: var(--primary-color);
    }
    
    .sidebar-dark-primary .nav-link i {
        color: #ffffff;
    }
    
    .sidebar-dark-primary .nav-link,
    .sidebar-dark-primary .nav-link i,
    .sidebar-dark-primary .nav-header {
        color: #ffffff;
    }

    .navbar-gradient {
        background-image: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        color: #FFFFFF;
    }
    
    .navbar-gradient .navbar-nav .nav-link {
        color: #FFFFFF;
    }
    
    .navbar-gradient .navbar-nav .nav-link:hover {
        color: #CCCCCC;
    }
    
    .nav-link-gradient {
        background: linear-gradient(to right, #3a8edb, var(--primary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    .nav-link-gradient:hover {
        background: linear-gradient(to right, var(--primary-color), #3a8edb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .text-blue-dark {
        color: var(--primary-color) !important;
    }
    
    .sidebar-dark-primary .nav-link {
        position: relative;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .sidebar-dark-primary .nav-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: var(--primary-color);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: -1;
    }
    
    .sidebar-dark-primary .nav-link:hover::before {
        opacity: 1;
    }
</style>
@stop

@section('js')
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    // Obtener la fecha actual
    var hoy = new Date();
    var fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1).toString().padStart(2, '0')+'-'+hoy.getDate().toString().padStart(2, '0');
    document.getElementById('fechadevolucion').value = fecha;

    // Habilitar campos al buscar factura
    document.getElementById("searchInvoice1").addEventListener("click", function(event) {
        event.preventDefault();
        buscarFactura();
        document.getElementById('fechadevolucion').disabled = false;
        document.getElementById('motivodevolucion').disabled = false;
        document.getElementById('accionestomada').disabled = false;
        document.getElementById('motivodevolucion1').disabled = false;
    });

    // Buscar factura
    function buscarFactura() {
        var numeroFactura = document.getElementById("searchInvoice").value;
        if(!numeroFactura) {
            alert("Por favor ingrese un número de factura");
            return;
        }

        fetch(`/buscarFactura?id_factura=${numeroFactura}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Factura no encontrada');
            }
            return response.json();
        })
        .then(data => {
            var factura = data.factura;
            var detalles = data.detalles;

            // Mostrar datos de la factura
            document.getElementById("NumFactura").innerText = factura.id_factura;
            document.getElementById("fechafactura").innerText = factura.fechafactura;
            document.getElementById("totalfactura").innerText = parseFloat(factura.totalfactura).toFixed(2);
            document.getElementById("estado").innerText = factura.estado;
            
            // Mostrar detalles
            var detallesTable = document.getElementById("detallesTableBody1");
            detallesTable.innerHTML = "";
            
            detalles.forEach(function(detalle) {
                var row = detallesTable.insertRow();
                row.innerHTML = `
                    <td class="text-center">${detalle.idproducto}</td>
                    <td class="text-center">${detalle.cantidad}</td>
                    <td class="text-right">${parseFloat(detalle.precio).toFixed(2)}</td>
                    <td class="text-right">${parseFloat(detalle.importe).toFixed(2)}</td>
                `;
            });
            
            calcularTotal();
        })
        .catch(error => {
            console.error("Error:", error);
            alert(error.message);
        });
    }

    // Calcular total devolución
    function calcularTotal() {
        var total = 0;
        $('#detallesTableBody1 tr').each(function() {
            var subtotal = parseFloat($(this).find('td:eq(3)').text());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $('#total').val(total.toFixed(2));
    }

    // Anular factura
    document.getElementById("Anularfact").addEventListener("click", function(event) {
        event.preventDefault();

        var idfactura = document.getElementById("searchInvoice").value;
        var fechaDevolucion = document.getElementById("fechadevolucion").value;
        var totalDevolucion = document.getElementById("total").value;
        var iddevolucion = document.getElementById("iddevolucion").value;
        var motivoDevolucion = document.getElementById("motivodevolucion").value;
        var accionesTomadas = document.getElementById("accionestomada").value;
        var estado = document.getElementById("motivodevolucion1").value;
        
        if (!idfactura || !fechaDevolucion || !totalDevolucion || !motivoDevolucion || !accionesTomadas) {
            alert("Por favor, complete todos los campos.");
            return;
        }

        // Obtener detalles
        var detalles = [];
        $('#detallesTableBody1 tr').each(function() {
            var detalle = {
                idproducto: $(this).find('td:eq(0)').text(),
                cantidadD: $(this).find('td:eq(1)').text(),
                precio: $(this).find('td:eq(2)').text()
            };
            detalles.push(detalle);
        });

        var data = {
            estado: estado,
            idfactura: idfactura,
            fechadevolucion: fechaDevolucion,
            totaldevolucion: totalDevolucion,
            motivodevolucion: motivoDevolucion,
            accionestomadas: accionesTomadas,
            iddevolucion: iddevolucion,
            detalle: detalles
        };

        fetch('/anularFactura1', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                return response.text().then(text => {
                    throw new Error(text || 'Error en la solicitud');
                });
            }
            return response.json();
        })
        .then(data => {
            alert("Factura anulada y devolución registrada correctamente");
            setTimeout(() => window.location.reload(), 1000);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al anular la factura: ' + error.message);
        });
    });

    // Cancelar proceso
    document.getElementById("btnCancelar").addEventListener("click", function() {
        if(confirm('¿Está seguro de cancelar esta devolución?')) {
            window.location.reload();
        }
    });
});
</script>
@stop