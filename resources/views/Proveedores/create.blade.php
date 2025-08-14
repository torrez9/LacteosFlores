@extends('adminlte::page')

@section('title', 'Nuevo Proveedor')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="m-0">Registro de Proveedor</h1>
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#imagenAyuda">
        <i class="fas fa-question-circle"></i> Ayuda
    </button>
</div>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-primary shadow">
        <div class="card-header" style="background: linear-gradient(to right, #4dabf7, #2e6da4);">
            <h3 class="card-title text-white">Datos del Proveedor</h3>
        </div>
        
        <form action="{{route('Proveedores.store')}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @include('Proveedores.form')
                    </div>
                </div>
            </div>
            
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success btn-sm mr-2">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{route('Proveedores.index')}}" class="btn btn-danger btn-sm mr-2">
                    <i class="fas fa-times"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Ventana emergente (modal) -->
<div class="modal fade" id="imagenAyuda" tabindex="-1" role="dialog" aria-labelledby="imagenAyudaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('images/ayuda/proveedorcreate.png') }}" class="img-fluid" alt="Imagen de Ayuda" style="max-height: 80vh;">
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

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .card-header {
        border-top-left-radius: 10px !important;
        border-top-right-radius: 10px !important;
    }

    .form-control {
        border-radius: 5px;
    }

    .btn {
        border-radius: 5px;
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
    // Validación básica del formulario antes de enviar
    document.querySelector('form').addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            alert('Por favor complete todos los campos requeridos');
        }
    });

    // Agregar clases de validación cuando se deja un campo requerido vacío
    document.querySelectorAll('[required]').forEach(field => {
        field.addEventListener('blur', function() {
            if (!this.value.trim()) {
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-invalid');
            }
        });
    });
</script>
@stop