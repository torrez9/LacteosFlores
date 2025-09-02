## Análisis de Vulnerabilidades de Seguridad

Aquí tienes un resumen de las vulnerabilidades encontradas en el proyecto **Lácteos Flores**, clasificadas por severidad:

### Tabla de Vulnerabilidades

| Paquete            | Severidad | CVE           | Descripción                                                      | Versiones Afectadas                                              |
|--------------------|-----------|---------------|------------------------------------------------------------------|------------------------------------------------------------------|
| laravel/framework  | Alta      | CVE-2024-52301 | Manipulación de entorno Laravel mediante cadena de consulta      | <6.20.45, <7.30.7, <8.83.28, <9.52.17, <10.48.23, <11.31.0       |

---

## Vulnerabilidades encontradas en el sistema web "Lácteos Flores"

En las imágenes proporcionadas se evidencian diversas vulnerabilidades detectadas en el sistema web **Lácteos Flores**. Estas capturas muestran fallos de seguridad que podrían ser explotados por un atacante para comprometer la integridad, confidencialidad y disponibilidad del sistema.

Entre las vulnerabilidades identificadas se incluyen posibles problemas de inyección de código, exposición de información sensible, errores de configuración y rutas o recursos accesibles sin la debida autorización.

El análisis visual de estas capturas sugiere la necesidad de implementar medidas de seguridad adicionales, como validación de entradas, controles de acceso más estrictos y auditorías periódicas del sistema, con el fin de mitigar riesgos y proteger los datos de usuarios y la operación del portal web.

### Capturas de pantalla
![Vulnerabilidades 1](https://github.com/user-attachments/assets/6ea59da2-aabd-4974-aab7-ebfb666542c6)  

---

## Solución aplicada

Para resolver la vulnerabilidad reportada en **Laravel Framework (CVE-2024-52301)**, se realizaron los siguientes pasos:

1. Se revisó la versión actual del proyecto para confirmar que estaba dentro de las versiones afectadas.  
   ![Revisión de versión](https://github.com/user-attachments/assets/44110b2a-ec70-4637-9745-ce2fe887737f)

2. Se actualizó el framework a una versión segura que corrige la vulnerabilidad.  

3. Posteriormente, se ejecutó nuevamente el análisis de vulnerabilidades. Como se puede observar en la siguiente imagen, la vulnerabilidad crítica ya no aparece:  
   - Antes: **7 vulnerabilidades**  
   - Después: **6 vulnerabilidades** (se eliminó la crítica relacionada con Laravel).  

   ![Resultado posterior](https://github.com/user-attachments/assets/913b2687-bd1d-424d-bf71-7051faef10bf)

---

✅ Con esta actualización, el proyecto deja de ser vulnerable a la manipulación de entorno mediante cadena de consulta en Laravel.
