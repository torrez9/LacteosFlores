Detección del problema

El error inicial fue: Class "ZipArchive" not found al usar spatie/laravel-backup.

Al intentar actualizar league/commonmark a ^2.6, Composer falló indicando que faltaba ext-zip (la extensión ZIP de PHP).

Conclusión: el entorno PHP (XAMPP) no tenía habilitada la extensión zip, requerida por ZipArchive y por spatie/laravel-backup.
<img width="1114" height="314" alt="Captura de pantalla 2025-09-02 210226" src="https://github.com/user-attachments/assets/e9c4613b-c368-4bd1-b350-29fa27cf662a" />
<img width="720" height="189" alt="Captura de pantalla 2025-09-02 210154" src="https://github.com/user-attachments/assets/d668e650-842a-4eb9-9030-e699fec85977" />
<img width="1301" height="900" alt="Captura de pantalla 2025-09-02 210132" src="https://github.com/user-attachments/assets/8ff86b08-8bc1-4ed7-89b4-26cea8e816ed" />
<img width="1308" height="906" alt="Captura de pantalla 2025-09-02 210057" src="https://github.com/user-attachments/assets/0fe4dcac-12a7-42b3-9439-8a99c9265d7a" />
<img width="947" height="193" alt="Captura de pantalla 2025-09-02 210024" src="https://github.com/user-attachments/assets/266c948b-234c-4222-b1d3-e7934b1dae74" />
Corrección en XAMPP (habilitar ext-zip)

Abrimos C:\xampp\php\php.ini.

Activamos la extensión cambiando:

;extension=zip


por

extension=zip


Guardamos y reiniciamos Apache desde el panel de XAMPP.

Verificamos en consola:

php -m | findstr zip   # Debe mostrar 'zip'
php --ini              # Para confirmar qué php.ini usa el CLI de Composer


Nota: Esto asegura que tanto Apache como el CLI de PHP/Composer usen un PHP con ext-zip habilitado.

3) Parche temporal en config/backup.php (opcional pero útil)

Para evitar que la app “truene” si ZipArchive no está disponible, se puede proteger la constante:

'compression_method' => \defined('\ZipArchive::CM_DEFAULT') ? \ZipArchive::CM_DEFAULT : null,


Una vez habilitado ext-zip, puedes dejarla simplemente como \ZipArchive::CM_DEFAULT.

4) Actualización de seguridad de league/commonmark

Con ext-zip ya habilitado, actualizamos el paquete vulnerable:

composer require league/commonmark:^2.6
composer audit   # Para confirmar que desapareció la alerta

5) Verificación final

Probamos el flujo de backup:

php artisan backup:run


Debe crear el zip sin errores.

(Opcional) Revisamos migraciones/seed si era parte del flujo:

php artisan migrate --seed
