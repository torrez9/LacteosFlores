@extends('adminlte::page')

@section('title', 'Acerca de')

@section('content')
<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="display-4 text-blue-dark font-weight-bold">Nuestro Equipo</h1>
            <p class="lead text-muted">Conoce a los desarrolladores detrás de este proyecto</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Tarjeta 1 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-4">
                    <div class="team-img mx-auto mb-4">
                        <img src="{{ asset('images/DarwinTorrez.png') }}" alt="Darwin Torrez" class="img-fluid rounded-circle shadow">
                    </div>
                    <h3 class="h4 mb-2 text-primary">Darwin Torrez</h3>
                    <span class="badge badge-primary mb-3">Estudiante de tercer año</span>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope mr-2 text-blue"></i>
                            <a href="mailto:darwincarballo82@gmail.com" class="text-dark">darwincarballo82@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2 text-blue"></i>
                            <a href="tel:+50582102295" class="text-dark">+505 82102295</a>
                        </li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-blue mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-4">
                    <div class="team-img mx-auto mb-4">
                        <img src="{{ asset('images/HaroldGustavo.png') }}" alt="Harold Gustavo" class="img-fluid rounded-circle shadow">
                    </div>
                    <h3 class="h4 mb-2 text-primary">Harold Gustavo</h3>
                    <span class="badge badge-primary mb-3">Estudiante de tercer año</span>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope mr-2 text-blue"></i>
                            <a href="mailto:gustavolopezharold15@gmail.com" class="text-dark">gustavolopezharold15@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2 text-blue"></i>
                            <a href="tel:+50586119087" class="text-dark">+505 86119087</a>
                        </li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-blue mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-4">
                    <div class="team-img mx-auto mb-4">
                        <img src="{{ asset('images/ManyelIssac.png') }}" alt="Manyel Issac" class="img-fluid rounded-circle shadow">
                    </div>
                    <h3 class="h4 mb-2 text-primary">Manyel Issac</h3>
                    <span class="badge badge-primary mb-3">Estudiante de tercer año</span>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope mr-2 text-blue"></i>
                            <a href="mailto:rodriisaac9819@gmail.com" class="text-dark">rodriisaac9819@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2 text-blue"></i>
                            <a href="tel:+50558665322" class="text-dark">+505 58665322</a>
                        </li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-blue mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 4 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-4">
                    <div class="team-img mx-auto mb-4">
                        <img src="{{ asset('images/MarioAcuna.png') }}" alt="Mario Nicoya" class="img-fluid rounded-circle shadow">
                    </div>
                    <h3 class="h4 mb-2 text-primary">Mario Nicoya</h3>
                    <span class="badge badge-primary mb-3">Estudiante de tercer año</span>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope mr-2 text-blue"></i>
                            <a href="mailto:marionicoya4@gmail.com" class="text-dark">marionicoya4@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2 text-blue"></i>
                            <a href="tel:+50587268006" class="text-dark">+505 87268006</a>
                        </li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-blue mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 5 -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-4">
                    <div class="team-img mx-auto mb-4">
                        <img src="{{ asset('images/KevinDavid.png') }}" alt="Kevin David" class="img-fluid rounded-circle shadow">
                    </div>
                    <h3 class="h4 mb-2 text-primary">Kevin David</h3>
                    <span class="badge badge-primary mb-3">Estudiante de tercer año</span>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope mr-2 text-blue"></i>
                            <a href="mailto:kevintorrezhernandez@gmail.com" class="text-dark">kevintorrezhernandez@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone mr-2 text-blue"></i>
                            <a href="tel:+50557736856" class="text-dark">+505 57736856</a>
                        </li>
                    </ul>
                    <div class="social-links mt-3">
                        <a href="#" class="text-blue mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="text-blue mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
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

    .text-blue {
        color: var(--secondary-color);
    }

    .text-primary {
        color: var(--primary-color) !important;
    }

    .team-card {
        transition: all 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
        background-color: white;
    }

    .team-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .team-img {
        width: 150px;
        height: 150px;
        border: 5px solid rgba(77, 171, 247, 0.2);
        transition: all 0.3s ease;
    }

    .team-card:hover .team-img {
        border-color: rgba(77, 171, 247, 0.5);
    }

    .team-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .badge-primary {
        background-color: var(--secondary-color);
        color: white;
        font-weight: normal;
        padding: 5px 15px;
        border-radius: 20px;
    }

    .social-links a {
        transition: all 0.3s ease;
    }

    .social-links a:hover {
        transform: scale(1.2);
        color: var(--primary-color) !important;
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
    $(document).ready(function() {
        // Efecto de aparición suave para las tarjetas
        $('.team-card').each(function(i) {
            $(this).delay(i * 200).animate({
                opacity: 1,
                top: 0
            }, 400);
        });
    });
</script>
@stop