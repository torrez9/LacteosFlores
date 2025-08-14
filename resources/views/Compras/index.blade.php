@extends('adminlte::page')

@section('title', 'Compra')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Registro de Compras</h1>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda">Ayuda</button>
</div>
@stop

@section('content')
<div class="container-fluid p-0 h-100 d-flex flex-column">
    <form action="{{route('Compra.store')}}" method="POST" class="flex-grow-1 d-flex flex-column">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fechacompra">Fecha Compra</label>
                    <input type="date" class="form-control" id="fechacompra" name="fechacompra" placeholder="Fecha del día" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="NoFactura">No. Compra</label>
                    <input value="{{ $nuevoId }}" type="text" class="form-control" id="NoFactura" readonly>
                    <input type="hidden" id="idusuario" name="idusuario" value="{{ Auth::id() }}">
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_proveedores">Proveedor</label>
                    <select class="form-control custom-select" id="id_proveedores" name="id_proveedores" disabled>
                        <option>Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedores }}">
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_producto">Producto</label>
                    <select class="form-control custom-select" id="id_producto" name="id_producto" disabled>
                        <option>Selecciona un producto</option>
                        @foreach ($productos as $product)
                            <option value="{{ $product->id_producto }}" data-cantidad="{{ $product->cantidadprod }}">
                                {{ $product->descripcion }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="precio">Precio Compra</label>
                    <input type="number" id="precio" name="precio" class="form-control" step="0.01" disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" disabled>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cantidadprod">Stock Actual</label>
                    <input type="number" id="cantidadprod" name="cantidadprod" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-10 d-flex align-items-end">
                <div class="button-container mb-3">
                    <button type="button" id="btnNuevaC" class="btn btn-info btn-sm mr-2">Nueva Compra</button>
                    <button type="button" id="btnAgregarPro" class="btn btn-success btn-sm mr-2">Agregar</button>
                </div>
            </div>
        </div>

        <div class="table-responsive flex-grow-1" style="height: calc(100vh - 450px);">
            <table class="table table-bordered table-hover table-sm" id="tablacompras">
                <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white; position: sticky; top: 0; z-index: 1;">
                    <tr>
                        <th class="text-center">ID Producto</th>
                        <th class="text-center">Precio Compra</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tablacompras-body"></tbody>
            </table>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="button-container">
                    <button type="submit" id="btnguardar" class="btn btn-success btn-sm mr-2">Guardar Compra</button>
                    <button type="button" id="btnCancelarC" class="btn btn-danger btn-sm">Cancelar</button>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="form-group d-inline-block">
                    <label class="total-label">Total:</label>
                    <input type="number" id="Total" name="Total" class="form-control form-control-sm" style="width: 150px;" readonly>
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
                <img src="{{ asset('images/ayuda/compra.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
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
    #tablacompras {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 0;
    }
    
    #tablacompras th {
        font-weight: 600;
        padding: 12px 8px;
        position: sticky;
        top: 0;
        background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        z-index: 10;
    }
    
    #tablacompras td {
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
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1).toString().padStart(2, '0')+'-'+today.getDate().toString().padStart(2, '0');
    
    // Mostrar la fecha en el cuadro de texto
    document.getElementById('fechacompra').value = date;

    // Habilitar campos para nueva compra
    document.getElementById("btnNuevaC").addEventListener("click", function(event) {
        event.preventDefault();
        document.getElementById('precio').disabled = false;
        document.getElementById('id_proveedores').disabled = false;
        document.getElementById('id_producto').disabled = false;
        document.getElementById('cantidad').disabled = false;
    });

    // Cambio en selección de producto
    $(document).ready(function() {
        $('#id_producto').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var cantidad = selectedOption.data('cantidad');
            $('#cantidadprod').val(cantidad);
        });
    });

    // Agregar producto a la tabla
    $('#btnAgregarPro').click(function() {
        var precioCompra = parseFloat($('#precio').val());
        var cantidad = parseInt($('#cantidad').val());
        var id_producto = $('#id_producto').val();
        var productoText = $('#id_producto option:selected').text();
        var id_proveedor = $('#id_proveedores').val();

        if (!isNaN(precioCompra) && !isNaN(cantidad) && precioCompra > 0 && cantidad > 0 && 
            id_producto !== '' && id_producto !== 'Selecciona un producto') {
            
            agregarFila(id_producto, productoText, precioCompra, cantidad);
            
            // Limpiar campos
            $('#precio').val('');
            $('#cantidad').val('');
            $('#id_producto').val('Selecciona un producto');
            $('#cantidadprod').val('');
            
            // Deshabilitar proveedor después de agregar
            document.getElementById('id_proveedores').disabled = true;
        } else {
            alert('Por favor, complete todos los campos con valores válidos.');
        }
    });

    // Función para agregar fila a la tabla
    function agregarFila(id_producto, producto, precioCompra, cantidad) {
        var subtotal = precioCompra * cantidad;
        var newRow = '<tr>' +
            '<td class="text-center">' + id_producto + '</td>' +
            '<td class="text-right">' + precioCompra.toFixed(2) + '</td>' +
            '<td class="text-center">' + cantidad + '</td>' +
            '<td class="text-right">' + subtotal.toFixed(2) + '</td>' +
            '<td class="text-center">' +
            '<button type="button" class="btn btn-warning btn-sm btn-editar mr-1"><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-danger btn-sm btn-eliminar"><i class="fas fa-trash-alt"></i></button>' +
            '</td>' +
            '</tr>';
            
        $('#tablacompras-body').append(newRow);
        calcularTotal();
    }

    // Calcular total
    function calcularTotal() {
        var total = 0;
        $('#tablacompras-body tr').each(function() {
            var subtotal = parseFloat($(this).find('td:eq(3)').text());
            if (!isNaN(subtotal)) {
                total += subtotal;
            }
        });
        $('#Total').val(total.toFixed(2));
    }

    // Eliminar fila
    $(document).on('click', '.btn-eliminar', function() {
        $(this).closest('tr').remove();
        calcularTotal();
    });

    // Editar fila
    $(document).on('click', '.btn-editar', function() {
        var row = $(this).closest('tr');
        var id_producto = row.find('td:eq(0)').text();
        var precio = row.find('td:eq(1)').text();
        var cantidad = row.find('td:eq(2)').text();
        
        $('#id_producto').val(id_producto);
        $('#precio').val(precio);
        $('#cantidad').val(cantidad);
        
        row.remove();
        calcularTotal();
    });

    // Cancelar compra
    document.getElementById("btnCancelarC").addEventListener("click", function() {
        if(confirm('¿Está seguro de cancelar esta compra?')) {
            window.location.reload();
        }
    });

    // Guardar compra
    document.getElementById("btnguardar").addEventListener("click", function(e) {
        e.preventDefault();
        
        var fechacompra = document.getElementById("fechacompra").value;
        var id_proveedores = document.getElementById("id_proveedores").value;
        var idusuario = document.getElementById("idusuario").value;
        var Total = document.getElementById("Total").value;
        
        if(id_proveedores === '' || id_proveedores === 'Selecciona un proveedor') {
            alert('Por favor seleccione un proveedor');
            return;
        }

        var detalles = [];
        var tableRows = document.querySelectorAll("#tablacompras-body tr");
        if(tableRows.length === 0) {
            alert('No hay productos en la compra');
            return;
        }

        tableRows.forEach(function(row) {
            var detalle = {
                idproducto: row.cells[0].textContent,
                precio: parseFloat(row.cells[1].textContent),
                cantidad: parseInt(row.cells[2].textContent),
                importe: parseFloat(row.cells[3].textContent)
            };
            detalles.push(detalle);
        });

        var data = {
            fechacompra: fechacompra,
            idproveedores: id_proveedores,
            id_usuario: idusuario,
            Total: Total,
            detalles: detalles
        };

        fetch('{{ route("Compra.store") }}', {
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
            alert("Compra registrada con éxito");
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al registrar la compra: ' + error.message);
        });
    });
});
</script>
@stop