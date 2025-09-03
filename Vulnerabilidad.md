# Análisis de Vulnerabilidades de Seguridad
En el Proyecto se utilizo el comando 'composer Audit', para encontrar distintas vulnerabilidades.

### Se muestra una de las vulnerabilidades encontradas
<img width="782" height="174" alt="{7147CF26-C530-4D2B-8292-0A126D150697}" src="https://github.com/user-attachments/assets/096e782a-b4f0-46da-93f3-e0b73854a32f" />

## Vulnerabilidad: Laravel environment manipulation via query string

(CVE-2024-52301)

🔎 ¿Qué pasa?

En las versiones afectadas de Laravel, es posible manipular variables de entorno (.env) a través de la query string de una URL en ciertas condiciones.
En este caso la versión del Proyecto es :Laravel Framework 10.48.23; y esta vulnerabilidad es capaz de afectar las siguientes versiones:

### 📌 Versiones afectadas:

<6.20.45

>=7.0.0 <7.30.7

>=8.0.0 <8.83.28

>=9.0.0 <9.52.17

>=10.0.0 <10.48.23

>=11.0.0 <11.31.0


## Solución

### ✅ Cómo solucionarlo

Debes actualizar Laravel a una versión segura.

Se pueden utilizar distintos comandos dependiendo de la Versión de Laravel, en nuestro caso ejecutamos: composer require laravel/framework:^10.48.23 --update-with-dependencies
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/aae9d9d7-612b-4b9e-a15a-6e437bdce4c4" />

De esta forma pasamos a corregir la vulnerabilidad encontrada.

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/d83dce6b-3f19-405d-af3b-28eaf04390e0" />

Una vez Que se Ejecuta el comando se actualiza la paqueteria de .Composer.Json, y de esta forma de contraresta esta vulnerabilidad
