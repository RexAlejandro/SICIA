# SICIA - Sistema de Información para la Gestión de Cotizaciones

SICIA es una plataforma web orientada a facilitar y agilizar la elaboración de cotizaciones para pequeños negocios, disminuyendo errores en el cálculo de materiales, mano de obra e impuestos, y permitiendo la administración eficiente de clientes y servicios.

## 🛠️ Herramientas Utilizadas
*   **Frontend:** HTML5, CSS3 (Flexbox/Grid), JavaScript Vainilla.
*   **Backend:** PHP (PDO).
*   **Base de Datos:** MySQL / MariaDB (Diseño Relacional Optimizado).
*   **Entorno Local:** XAMPP (Apache + MySQL).

---

## ⚙️ Instrucciones de Instalación (Para el Equipo de Desarrollo)

Sigue estos pasos para clonar el proyecto y configurar la base de datos en tu entorno local.

### 1. Configurar la Base de Datos (MySQL)
1. Abre el Panel de Control de XAMPP.
2. Inicia los servicios de **Apache** y **MySQL** presionando el botón `Start` en ambos.
3. Presiona el botón `Admin` en la fila de MySQL para abrir **phpMyAdmin** en tu navegador.
4. En el panel izquierdo, haz clic en **"Nueva"** para crear una base de datos.
5. Nombra la base de datos estrictamente como: `db_sicia` y selecciona el cotejamiento `utf8mb4_spanish_ci` (para soportar acentos y caracteres).
6. Selecciona la base de datos recién creada y haz clic en la pestaña superior **"Importar"**.
7. Sube el archivo `.sql` que se encuentra en la carpeta raíz de este repositorio y presiona "Continuar" para que se generen todas las tablas y relaciones.

### 2. Abrir el Proyecto Localmente
1. Clona o descarga este repositorio de GitHub.
2. Mueve la carpeta principal del proyecto dentro de la carpeta pública de XAMPP, ubicada generalmente en `C:\xampp\htdocs\`.
3. Asegúrate de que la carpeta se llame únicamente `sicia`.
4. Abre tu navegador web e ingresa a la siguiente dirección:

```text
http://localhost/sicia/SICIA/
```