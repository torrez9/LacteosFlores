@extends('adminlte::page')

@section('title', 'Facturación')
@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Facturación</h1>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda">Ayuda</button>
</div>
@stop

@section('content')
<div class="container-fluid p-0 h-100 d-flex flex-column">
    <form action="{{route('Factura.store')}}" method="POST" class="flex-grow-1 d-flex flex-column">    
        @csrf
        <input type="hidden" id="idusuario" name="idusuario" value="{{Auth::id()}}">
        
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fechaVentas">Fecha Venta</label>
                    <input type="date" class="form-control" name="fechafactura" id="fechafactura" placeholder="Fecha del día" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="TextoFactura">No Factura</label>
                    <input value="{{ $nuevoId }}" type="text" class="form-control" id="NoFactura" readonly>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="producto" class="form-label">Seleccionar un producto:</label>
                    <select class="form-control form-control-sm custom-select" id="id_producto" name="id_producto" disabled>
                        <option>Selecciona un producto</option>
                        @foreach ($productos as $product)
                            <option value="{{ $product->id_producto }}" data-precio="{{ $product->precioventa }}"
                                data-cantidad="{{ $product->cantidadprod }}">{{ $product->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="precio1">Precio:</label>
                    <input type="number" id="precioventa" name="precio" class="form-control form-control-sm" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="stock1">Cantidad:</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control form-control-sm" disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cantidad1">Stock:</label>
                    <input type="number" id="cantidadprod" name="cantidadprod" class="form-control form-control-sm" readonly>
                </div>
            </div>
        </div>

        <div class="button-container mb-3">
            <button type="button" id="btnagregar" class="btn btn-success btn-sm">Agregar</button>
            <button type="button" id="ActualizarPro" class="btn btn-primary btn-sm">Actualizar</button>
            <button type="button" id="Nuevaventa" class="btn btn-info btn-sm">Nueva Venta</button>
        </div>
        
        <div class="table-responsive flex-grow-1" style="height: calc(100vh - 400px);">
            <table class="table table-bordered table-hover table-sm" id="tablafact">
                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white; position: sticky; top: 0; z-index: 1;">
                    <tr>
                        <th class="text-center">ID Producto</th>
                        <th class="text-center">Producto</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="tBody">
                    <!-- Aquí se agregarán las filas dinámicamente -->
                </tbody>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="button-container">
                    <button type="submit" id="Guardarventa" class="btn btn-success btn-sm">Guardar</button>
                    <button type="button" id="Cancelarventa" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="form-group d-inline-block">
                    <label class="total-label">Total:</label>
                    <input type="number" id="totalfactura" name="totalfactura" class="form-control form-control-sm" style="width: 150px;">
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Ventana emergente (modal) -->
<div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('images/ayuda/facturacion.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    
    .content-wrapper {
        height: calc(100vh - calc(3.5rem + 1px));
        overflow: hidden;
    }
    
    .container-fluid {
        height: 100%;
        padding: 20px;
    }
    
    /* Estilos para la tabla */
    #tablafact {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 0;
    }
    
    #tablafact th {
        font-weight: 600;
        padding: 12px 8px;
        position: sticky;
        top: 0;
        background: linear-gradient(to right, #4dabf7, #2e6da4);
        z-index: 10;
    }
    
    #tablafact td {
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
        color: #0056b3;
    }
    
    /* Resto de tus estilos personalizados */
    .sidebar-dark-primary {
        background-color: #2e6da4;
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
        background-image: linear-gradient(to right, #4dabf7, #2e6da4);
        color: #FFFFFF;
    }
    
    .navbar-gradient .navbar-nav .nav-link {
        color: #FFFFFF;
    }
    
    .navbar-gradient .navbar-nav .nav-link:hover {
        color: #CCCCCC;
    }
    
    .nav-link-gradient {
        background: linear-gradient(to right, #3a8edb, #1f5b96);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        display: inline-block;
    }
    
    .nav-link-gradient:hover {
        background: linear-gradient(to right, #1f5b96, #3a8edb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .text-blue-dark {
        color: #1f5b96 !important;
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
        background-color: #2e6da4;
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
    var Fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1).toString().padStart(2, '0')+'-'+hoy.getDate().toString().padStart(2, '0');
    
    // Mostrar la fecha en el cuadro de texto
    document.getElementById('fechafactura').value = Fecha;

    document.getElementById("Nuevaventa").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById('fechafactura').disabled = false;
        document.getElementById('cantidad').disabled = false;
        document.getElementById('id_producto').disabled = false;
    });

    $(document).ready(function() {
        $('#id_producto').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var precio = selectedOption.data('precio');
            var cantidad = selectedOption.data('cantidad');
            $('#precioventa').val(precio);
            $('#cantidadprod').val(cantidad);
        });
    });

    //Función para calcular el total de la factura
    function calcularTotal() {
        var total = 0;
        $('#tablafact tbody tr').each(function() {
            var subtotal = parseFloat($(this).find('td:eq(4)').text());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $('#totalfactura').val(total.toFixed(2));
    }

    //Función para agregar datos de manera dinamica
    function agregarFila(id,producto, precioVenta, cantidad) {
        var subtotal = precioVenta * cantidad;
        var newRow = '<tr>' +
            '<td class="text-center">' + id + '</td>' +
            '<td>' + producto + '</td>' +
            '<td class="text-right">' + precioVenta.toFixed(2) + '</td>' +
            '<td class="text-center">' + cantidad + '</td>' +
            '<td class="text-right">' + subtotal.toFixed(2) + '</td>' +
            '<td class="text-center">' +
            '<button type="button" class="btn btn-warning btn-sm btn-editar"><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-danger btn-sm btn-eliminar"><i class="fas fa-trash-alt"></i></button>' +
            '</td>' +
            '</tr>';
        $('.tBody').append(newRow);
        calcularTotal();
    }

    //Función para agregar Productos a la tabla
    $('#btnagregar').click(function() {
        var precio = parseFloat($('#precioventa').val());
        var cantidad = parseInt($('#cantidad').val());
        var stock = parseInt($('#cantidadprod').val());
        var productoS = $('#id_producto option:selected').text();
        var id = $('#id_producto option:selected').val();

        if (!isNaN(precio) && !isNaN(cantidad) && precio !== 0 && cantidad !== 0 &&
        productoS !== 'Selecciona un producto') {
            if(cantidad > stock) {
                alert('La cantidad ingresada excede el stock disponible.');
                return;
            } else if (cantidad < 1 || isNaN(cantidad)) {
                alert('Debe ingresar un número válido.');
                return;
            } 

            agregarFila(id, productoS, precio, cantidad);

            $('#precioventa').val('');
            $('#cantidad').val('');
            $('#cantidadprod').val('');
            $('#id_producto').val('Selecciona un producto');
        } else {
            alert('Por favor, complete todos los campos.');
        }
    });

    // Eliminar fila de la tabla
    $(document).on('click', '.btn-eliminar', function() {
        $(this).closest('tr').remove();
        calcularTotal();
    });

    // Editar fila de la tabla
    $(document).on('click', '.btn-editar', function() {
        var row = $(this).closest('tr');
        var id = row.find('td:eq(0)').text();
        var producto = row.find('td:eq(1)').text();
        var precio = row.find('td:eq(2)').text();
        var cantidad = row.find('td:eq(3)').text();
        
        $('#id_producto').val(id);
        $('#precioventa').val(precio);
        $('#cantidad').val(cantidad);
        
        row.remove();
        calcularTotal();
    });

    document.getElementById("Guardarventa").addEventListener("click", function(e) {
        e.preventDefault();
        
        var fechaventa = document.getElementById("fechafactura").value;
        var id_usuario = document.getElementById("idusuario").value;
        var total = document.getElementById("totalfactura").value;
        var detalles = [];

        var tableRows = document.querySelectorAll("#tablafact tbody tr");
        if(tableRows.length === 0) {
            alert('No hay productos en la factura');
            return;
        }

        tableRows.forEach(function(row) {
            var detalle = {
                idproducto: row.cells[0].textContent,
                cantidad: parseInt(row.cells[3].textContent),
                precio: parseFloat(row.cells[2].textContent),
                importe: parseFloat(row.cells[4].textContent)
            };
            detalles.push(detalle);
        });

        var data = {
            totalfactura: total,
            fechafactura: fechaventa,
            idusuario: id_usuario,
            estado: null,
            detalles: detalles
        };

        fetch('{{ route("Factura.store") }}', {
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
                    throw new Error('Error en la respuesta: ' + response.status + ', ' + text);
                });
            }
            return response.json();
        })
        .then(data => {
            alert("Venta realizada con éxito");
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al realizar la venta: ' + error.message);
        });
    });

    // Cancelar venta
    document.getElementById("Cancelarventa").addEventListener("click", function() {
        if(confirm('¿Está seguro de cancelar esta venta?')) {
            window.location.reload();
        }
    });
});
</script>
@stop