@extends('adminlte::page')

@section('title', 'Producto')
@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Productos</h1>
    <div>
        <a href="{{ route('Productos.create')}}" class="btn btn-info btn-sm">Crear Producto</a>
        <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#imagenAyuda">Ayuda</button>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid p-0 h-100 d-flex flex-column">
    <!-- Tabla que ocupa el espacio restante -->
    <div class="table-responsive flex-grow-1" style="height: calc(100vh - 120px);">
        <table class="table table-bordered table-hover table-sm" id="tablaProductos">
            <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white; position: sticky; top: 0; z-index: 1;">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="tbody2">
                @foreach ($productos as $producto)
                <tr class="fila-destacada">
                    <td class="text-center align-middle">{{ $producto->id_producto }}</td>
                    <td class="align-middle">{{ $producto->descripcion }}</td>
                    <td class="text-center align-middle">{{ $producto->cantidadprod }}</td>
                    <td class="text-right align-middle">${{ number_format($producto->precioventa, 2) }}</td>
                    <td class="text-center align-middle">{{ $producto->idproveedor }}</td>
                    <td class="text-center align-middle" style="min-width: 100px;">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('Productos.edit', $producto->id_producto) }}" class="btn btn-sm btn-warning mr-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('Productos.destroy', $producto->id_producto) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este Producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Ventana emergente (modal) -->
<div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('images/ayuda/productosagregados.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
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
        padding: 0;
    }
    
    /* Estilos para la tabla */
    #tablaProductos {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 0;
    }
    
    #tablaProductos th {
        font-weight: 600;
        padding: 12px 8px;
        position: sticky;
        top: 0;
        background: linear-gradient(to right, #4dabf7, #2e6da4);
        z-index: 10;
    }
    
    #tablaProductos td {
        padding: 10px 8px;
        vertical-align: middle;
    }
    
    .fila-destacada:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease;
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
<script src="JS/Productos1.js"></script>
<script>
    document.getElementById('SalirPr').onclick = function() {
        window.location.href = 'Menuprincipal.html';
    };
    
    // Opcional: Agregar datatables para mejor funcionalidad
    $(document).ready(function() {
        $('#tablaProductos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            "responsive": true,
            "autoWidth": false,
            "scrollY": "calc(100vh - 200px)",
            "scrollCollapse": true,
            "paging": false,
            "columnDefs": [
                { "orderable": false, "targets": [5] }
            ]
        });
    });
</script>
@stop