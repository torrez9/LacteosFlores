@extends('adminlte::page')

@section('title', 'Acerca de')

@section('content')
<div class="container-fluid py-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 text-blue-dark font-weight-bold mb-3">Nuestro Equipo</h1>
            <p class="lead text-muted mb-4">Conoce a los talentosos desarrolladores detrás de este proyecto</p>
            <div class="divider mx-auto" style="width: 80px; height: 4px; background: linear-gradient(to right, #4dabf7, #2e6da4); border-radius: 2px;"></div>
        </div>
    </div>

    <!-- Team Cards -->
    <div class="row justify-content-center">
        <!-- Tarjeta 1 -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-5">
                    <div class="team-img mx-auto mb-4 position-relative">
                        <img src="{{ asset('images/DarwinTorrez.png') }}" alt="Darwin Torrez" class="img-fluid rounded-circle shadow">
                        <div class="img-overlay rounded-circle"></div>
                    </div>
                    <h3 class="h4 mb-2 text-primary font-weight-bold">Darwin Torrez</h3>
                    <span class="badge badge-primary mb-3 px-3 py-2">Estudiante de tercer año</span>
                    <div class="team-info mb-3">
                        <div class="info-item mb-2">
                            <i class="fas fa-envelope text-blue mr-2"></i>
                            <a href="mailto:darwincarballo82@gmail.com" class="text-dark">darwincarballo82@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-blue mr-2"></i>
                            <a href="tel:+50582102295" class="text-dark">+505 82102295</a>
                        </div>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="social-icon github mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-5">
                    <div class="team-img mx-auto mb-4 position-relative">
                        <img src="{{ asset('images/HaroldGustavo.png') }}" alt="Harold Gustavo" class="img-fluid rounded-circle shadow">
                        <div class="img-overlay rounded-circle"></div>
                    </div>
                    <h3 class="h4 mb-2 text-primary font-weight-bold">Harold Gustavo</h3>
                    <span class="badge badge-primary mb-3 px-3 py-2">Estudiante de tercer año</span>
                    <div class="team-info mb-3">
                        <div class="info-item mb-2">
                            <i class="fas fa-envelope text-blue mr-2"></i>
                            <a href="mailto:gustavolopezharold15@gmail.com" class="text-dark">gustavolopezharold15@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-blue mr-2"></i>
                            <a href="tel:+50586119087" class="text-dark">+505 86119087</a>
                        </div>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="social-icon github mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-5">
                    <div class="team-img mx-auto mb-4 position-relative">
                        <img src="{{ asset('images/ManyelIssac.png') }}" alt="Manyel Issac" class="img-fluid rounded-circle shadow">
                        <div class="img-overlay rounded-circle"></div>
                    </div>
                    <h3 class="h4 mb-2 text-primary font-weight-bold">Manyel Issac</h3>
                    <span class="badge badge-primary mb-3 px-3 py-2">Estudiante de tercer año</span>
                    <div class="team-info mb-3">
                        <div class="info-item mb-2">
                            <i class="fas fa-envelope text-blue mr-2"></i>
                            <a href="mailto:rodriisaac9819@gmail.com" class="text-dark">rodriisaac9819@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-blue mr-2"></i>
                            <a href="tel:+50558665322" class="text-dark">+505 58665322</a>
                        </div>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="social-icon github mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 4 -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-5">
                    <div class="team-img mx-auto mb-4 position-relative">
                        <img src="{{ asset('images/MarioAcuna.png') }}" alt="Mario Nicoya" class="img-fluid rounded-circle shadow">
                        <div class="img-overlay rounded-circle"></div>
                    </div>
                    <h3 class="h4 mb-2 text-primary font-weight-bold">Mario Nicoya</h3>
                    <span class="badge badge-primary mb-3 px-3 py-2">Estudiante de tercer año</span>
                    <div class="team-info mb-3">
                        <div class="info-item mb-2">
                            <i class="fas fa-envelope text-blue mr-2"></i>
                            <a href="mailto:marionicoya4@gmail.com" class="text-dark">marionicoya4@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-blue mr-2"></i>
                            <a href="tel:+50587268006" class="text-dark">+505 87268006</a>
                        </div>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="social-icon github mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta 5 -->
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="team-card card border-0 shadow-lg h-100">
                <div class="card-body text-center p-5">
                    <div class="team-img mx-auto mb-4 position-relative">
                        <img src="{{ asset('images/KevinDavid.png') }}" alt="Kevin David" class="img-fluid rounded-circle shadow">
                        <div class="img-overlay rounded-circle"></div>
                    </div>
                    <h3 class="h4 mb-2 text-primary font-weight-bold">Kevin David</h3>
                    <span class="badge badge-primary mb-3 px-3 py-2">Estudiante de tercer año</span>
                    <div class="team-info mb-3">
                        <div class="info-item mb-2">
                            <i class="fas fa-envelope text-blue mr-2"></i>
                            <a href="mailto:kevintorrezhernandez@gmail.com" class="text-dark">kevintorrezhernandez@gmail.com</a>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone text-blue mr-2"></i>
                            <a href="tel:+50557736856" class="text-dark">+505 57736856</a>
                        </div>
                    </div>
                    <div class="social-links mt-4">
                        <a href="#" class="social-icon linkedin mx-2"><i class="fab fa-linkedin fa-lg"></i></a>
                        <a href="#" class="social-icon github mx-2"><i class="fab fa-github fa-lg"></i></a>
                        <a href="#" class="social-icon twitter mx-2"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="row mt-5">
        <div class="col-12 text-center">
            <div class="project-info bg-light py-4 rounded-lg">
                <h4 class="text-blue-dark mb-3">Sistema de Gestión - LacteosV3</h4>
                <p class="text-muted mb-0">Desarrollado con ❤️ usando Laravel y AdminLTE</p>
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
        --accent-color: #3498db;
        --text-color: #333;
        --light-gray: #f8f9fa;
        --card-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .text-blue {
        color: var(--secondary-color) !important;
    }

    .text-primary {
        color: var(--primary-color) !important;
    }

    .team-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border-radius: 20px;
        overflow: hidden;
        background: white;
        box-shadow: var(--card-shadow);
        opacity: 0;
        position: relative;
        top: 30px;
    }

    .team-card:hover {
        transform: translateY(-15px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .team-img {
        width: 160px;
        height: 160px;
        border: 4px solid rgba(77, 171, 247, 0.1);
        transition: all 0.4s ease;
        position: relative;
        z-index: 2;
    }

    .team-card:hover .team-img {
        border-color: rgba(77, 171, 247, 0.3);
        transform: scale(1.05);
    }

    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(77, 171, 247, 0.2), rgba(52, 152, 219, 0.1));
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
    }

    .team-card:hover .img-overlay {
        opacity: 1;
    }

    .team-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .team-card:hover .team-img img {
        filter: brightness(1.05);
    }

    .badge-primary {
        background: linear-gradient(45deg, var(--secondary-color), var(--primary-color));
        color: white;
        font-weight: 500;
        padding: 8px 20px;
        border-radius: 25px;
        font-size: 0.85rem;
        box-shadow: 0 4px 10px rgba(77, 171, 247, 0.3);
    }

    .team-info {
        background: rgba(248, 249, 250, 0.8);
        padding: 15px;
        border-radius: 15px;
        margin: 0 -5px;
    }

    .info-item {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        color: white !important;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .social-icon::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transition: all 0.3s ease;
        z-index: -1;
    }

    .social-icon.linkedin::before { background: #0077B5; }
    .social-icon.github::before { background: #333; }
    .social-icon.twitter::before { background: #1DA1F2; }

    .social-icon:hover {
        transform: translateY(-5px) scale(1.1);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    }

    .social-icon:hover::before {
        transform: scale(1.1);
    }

    .project-info {
        background: rgba(255, 255, 255, 0.9) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
    }

    .divider {
        width: 80px;
        height: 4px;
        background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
        border-radius: 2px;
        margin: 20px auto;
    }

    /* Animaciones */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .team-card {
        animation: fadeInUp 0.6s ease forwards;
    }

    .team-card:nth-child(1) { animation-delay: 0.1s; }
    .team-card:nth-child(2) { animation-delay: 0.2s; }
    .team-card:nth-child(3) { animation-delay: 0.3s; }
    .team-card:nth-child(4) { animation-delay: 0.4s; }
    .team-card:nth-child(5) { animation-delay: 0.5s; }

    /* Responsive */
    @media (max-width: 768px) {
        .team-img {
            width: 120px;
            height: 120px;
        }
        
        .card-body {
            padding: 25px !important;
        }
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
    
    .text-blue-dark {
        color: var(--primary-color) !important;
    }
    
    .sidebar-dark-primary .nav-link::before {
        background-color: var(--primary-color);
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Efecto de aparición suave para las tarjetas
        $('.team-card').each(function(i) {
            $(this).css('animation-delay', (i * 0.2) + 's');
        });

        // Efecto hover mejorado
        $('.team-card').hover(function() {
            $(this).find('.social-icon').css('opacity', '1');
        }, function() {
            $(this).find('.social-icon').css('opacity', '0.9');
        });
    });
</script>
@stop