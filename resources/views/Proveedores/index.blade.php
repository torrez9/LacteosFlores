@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Proveedores</h1>
    <div>
        <a href="{{ route('Proveedores.create')}}" class="btn btn-info btn-sm mr-2"><i class="fas fa-plus"></i> Nuevo Proveedor</a>
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda"><i class="fas fa-question-circle"></i> Ayuda</button>
    </div>
</div>
@stop

@section('content')
<div class="container-fluid p-0 h-100 d-flex flex-column">
    <div class="table-responsive flex-grow-1" style="height: calc(100vh - 150px);">
        <table class="table table-bordered table-hover table-sm" id="tablaProveedores">
            <thead style="background: linear-gradient(to right, #4dabf7, #2e6da4); color: white; position: sticky; top: 0; z-index: 1;">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">RUC</th>
                    <th>Empresa</th>
                    <th class="text-center">Teléfono</th>
                    <th>Email</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr class="fila-destacada">
                    <td class="text-center">{{ $proveedor->id_proveedores }}</td>
                    <td class="text-center">
                        <span class="badge {{ $proveedor->estado == 'Activo' ? 'badge-success' : 'badge-danger' }}">
                            {{ $proveedor->estado }}
                        </span>
                    </td>
                    <td class="text-center">{{ $proveedor->ruc }}</td>
                    <td>{{ $proveedor->razonsocial }}</td>
                    <td class="text-center">{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td class="text-center" style="min-width: 100px;">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('Proveedores.edit', $proveedor->id_proveedores) }}" class="btn btn-sm btn-warning mr-1" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('Proveedores.destroy', $proveedor->id_proveedores) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?')">
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
                <img src="{{ asset('images/ayuda/proveedoresagregados.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
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

    /* Estilos para la tabla */
    #tablaProveedores {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 0;
    }
    
    #tablaProveedores th {
        font-weight: 600;
        padding: 12px 8px;
        position: sticky;
        top: 0;
        background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        z-index: 10;
    }
    
    #tablaProveedores td {
        padding: 10px 8px;
        vertical-align: middle;
    }

    .fila-destacada:hover {
        background-color: rgba(77, 171, 247, 0.1);
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

    .badge-success {
        background-color: #28a745;
    }

    .badge-danger {
        background-color: #dc3545;
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
    // Opcional: Agregar datatables para mejor funcionalidad
    $(document).ready(function() {
        $('#tablaProveedores').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
            },
            "responsive": true,
            "autoWidth": false,
            "columnDefs": [
                { "orderable": false, "targets": [6] }
            ]
        });
    });

    document.getElementById('SalirP').onclick = function() {
        window.location.href = 'Menuprincipal.html';
    };
</script>
@stop