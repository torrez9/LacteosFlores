@extends('adminlte::page')

@section('title', 'Mantenimiento de Base de Datos')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Mantenimiento de Base de Datos</h1>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda">
        <i class="fas fa-question-circle"></i> Ayuda
    </button>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card de Respaldo -->
            <div class="card card-primary shadow mb-4">
                <div class="card-header" style="background: linear-gradient(to right, #4dabf7, #2e6da4);">
                    <h3 class="card-title text-white">
                        <i class="fas fa-database mr-2"></i>Respaldo de Base de Datos
                    </h3>
                </div>
                <div class="card-body text-center py-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <i class="fas fa-database fa-4x text-primary mb-3"></i>
                        <p class="lead text-muted">Realice una copia de seguridad completa de su base de datos</p>
                    </div>
                    
                    <form action="{{ route('backup.database') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="fas fa-save mr-2"></i>Generar Respaldo
                        </button>
                    </form>
                </div>
            </div>

            <!-- Card de Restauración -->
            <div class="card card-success shadow">
                <div class="card-header" style="background: linear-gradient(to right, #28a745, #218838);">
                    <h3 class="card-title text-white">
                        <i class="fas fa-undo-alt mr-2"></i>Restauración de Base de Datos
                    </h3>
                </div>
                <div class="card-body text-center py-4">
                    <div class="mb-4">
                        <i class="fas fa-file-import fa-4x text-success mb-3"></i>
                        <p class="lead text-muted">Restaurar la base de datos desde un archivo de respaldo</p>
                    </div>
                    
                    <form action="{{ route('restore.database') }}" method="post" enctype="multipart/form-data" id="restoreForm">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="backupFile" name="archivo_copia" required>
                                <label class="custom-file-label" for="backupFile" id="fileLabel">Seleccionar archivo de respaldo</label>
                            </div>
                            <small class="form-text text-muted">Formatos soportados: .sql, .zip</small>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fas fa-upload mr-2"></i>Restaurar Base de Datos
                        </button>
                    </form>
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
                <img src="{{ asset('images/ayuda/mantenimiento-bd.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
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
        --success-color: #28a745;
        --dark-success-color: #218838;
        --text-color: #333;
        --light-gray: #f8f9fa;
    }

    body {
        background-color: var(--light-gray);
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
    }

    .fa-4x {
        font-size: 4rem;
    }

    .lead {
        font-size: 1.25rem;
    }

    .btn-lg {
        padding: 0.5rem 1.5rem;
        font-size: 1.1rem;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
        content: "Buscar";
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
    // Mostrar nombre de archivo seleccionado
    document.getElementById('backupFile').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        document.getElementById('fileLabel').textContent = fileName;
    });

    // Confirmación antes de restaurar
    document.getElementById('restoreForm').addEventListener('submit', function(e) {
        if(!confirm('¿Está seguro que desea restaurar la base de datos? Esta acción sobrescribirá los datos actuales.')) {
            e.preventDefault();
        }
    });

    // Cerrar alertas automáticamente después de 5 segundos
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
</script>
@stop