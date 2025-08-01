# 🚨 Problema de Conexión en el Entorno de Desarrollo (Vite & Docker)

Este documento describe un problema común en entornos de desarrollo que combinan Laravel, Vite y Docker, y proporciona una guía detallada para su solución.

---

### Descripción del Problema

Al ejecutar `npm run dev` para iniciar el servidor de desarrollo de Vite, se produce un error de conexión que impide que el frontend se comunique con el backend de Laravel. El error típico es el siguiente:

Esto indica que el servidor de Vite no puede establecer una conexión con el servicio PHP-FPM, que es el que gestiona las peticiones de Laravel dentro de tu contenedor de Docker.

### Causa del Problema

El error `Connection refused` (conexión rechazada) ocurre cuando un cliente (en este caso, el servidor de desarrollo de Vite que se ejecuta en tu máquina local) intenta conectarse a una dirección IP y puerto que no tiene un servicio activo escuchando peticiones.

La causa principal en este tipo de configuración es que el servicio PHP-FPM dentro del contenedor de Docker no es accesible desde el host (tu máquina local). Esto puede deberse a dos razones principales:

1.  **Mapeo de Puertos Incorrecto:** El puerto de escucha del contenedor de PHP (normalmente el 9000) no está "mapeado" al puerto de tu máquina local en el archivo `docker-compose.yml`. Para que Vite pueda comunicarse con PHP, debe poder acceder al puerto 9000 de forma externa al contenedor.

2.  **Configuración de Host de PHP-FPM:** El servicio PHP-FPM está configurado para escuchar solo en `127.0.0.1` (localhost) dentro del contenedor, lo que impide que las conexiones externas (como las de Vite) lleguen a él. En entornos Docker, es necesario que escuche en `0.0.0.0` para aceptar conexiones de cualquier origen.

### Solución Paso a Paso

Sigue estos pasos para diagnosticar y solucionar el problema:

#### Paso 1: Verificar el archivo `docker-compose.yml`

Abre tu archivo `docker-compose.yml` y localiza el servicio `php`. Asegúrate de que el mapeo de puertos esté configurado correctamente para el puerto 9000.

Tu configuración de `php` debería verse similar a esto:

```yaml
version: '3.8'

services:
  # ... otros servicios
  
  php:
    # ... otras configuraciones del servicio php
    volumes:
      - .:/var/www/html
    # Línea crucial para permitir la conexión desde el host:
    ports:
      - "9000:9000"
    # ... otras configuraciones