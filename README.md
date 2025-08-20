<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo de Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Estado de compilación"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Descargas Totales"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Última Versión Estable"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Licencia"></a>
</p>

# ⏰ Proyecto de Alarma con Laravel

Este proyecto está desarrollado con **Laravel**, un framework moderno de PHP que facilita la creación de aplicaciones web robustas, seguras y con una sintaxis elegante.  

---

## 📖 Acerca de Laravel

Laravel elimina la complejidad del desarrollo al simplificar tareas comunes como:

- ⚡ Enrutamiento simple y rápido.  
- 📦 Contenedor de inyección de dependencias.  
- 🗄️ Múltiples back-ends para sesiones y caché.  
- 📝 ORM Eloquent expresivo e intuitivo.  
- 🔄 Migraciones de base de datos portables.  
- 🧵 Procesamiento de trabajos en segundo plano.  
- 📡 Difusión de eventos en tiempo real.  

---

## 🚀 Comandos útiles para iniciar el proyecto

Instalar dependencias de PHP con Composer
```
composer install
```

Copiar el archivo de entorno
```
cp .env.example .env
```

Generar la clave de la aplicación
```
php artisan key:generate
```

Ejecutar las migraciones de la base de datos
```
php artisan migrate
```

(Opcional: si quieres cargar datos de prueba)
```
php artisan migrate --seed
```

Levantar el servidor de desarrollo de Laravel
```
php artisan serve
```
Esto abrirá el proyecto en: http://127.0.0.1:8000

---

### 🔹 Pasos para compilar los assets (con NPM)

Instalar dependencias de Node.js
```
npm install
```

Levantar el entorno de desarrollo con Vite
```
npm run dev
```
Esto queda escuchando cambios en tiempo real (hot reload).

Construir los assets para producción
```
npm run build
```
