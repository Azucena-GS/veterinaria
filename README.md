# 🐾 Sistema de Gestión Veterinaria - SB Admin 2

Este repositorio contiene el desarrollo de un sistema integral de gestión para clínicas veterinarias, construido con **Laravel 11** y la plantilla **SB Admin 2**. A continuación, se resume todo el historial de implementaciones, módulos desarrollados y configuraciones realizadas.

## 🚀 Historial de Desarrollo e Implementaciones

### 1. Migración de Autenticación y UI Base
- Se migró la lógica de inicio de sesión y gestión de sesiones de un proyecto anterior (sin funcionalidad de registro público).
- Creación de usuarios de prueba (Administrador y Veterinario) mediante un `seeder` personalizado.
- Integración del tema **SB Admin 2** con layouts modulares de Blade (`app.blade.php`, `auth.blade.php`) utilizando componentes parciales (sidebar, topbar, footer).
- Mejora de la vista del login con branding personalizado (logo de la veterinaria).

### 2. Sistema de Roles y Panel de Administración
- Actualización de la migración de `users` para incluir el campo `role` como Enum (`administrador` y `veterinario`), manteniendo un esquema de base de datos limpio.
- Implementación de un Dashboard exclusivo para administradores, con rutas protegidas (`/admin/home`).
- Configuración de ruteo inteligente y protección con *Middlewares* para asegurar que cada rol acceda a su panel correspondiente.
- Habilitación del control de colapso (*toggle*) para el menú lateral (*sidebar*).

### 3. Módulo CRUD de Usuarios Administrativos
- Desarrollo completo del módulo CRUD (Crear, Leer, Actualizar, Eliminar) para gestionar los usuarios con acceso al sistema.
- Remoción de campos que no aplicaban ("Especialidad" y "Cédula") en las vistas administrativas (`show`, `create`, `edit`).
- Implementación de vista `show` con botón de eliminación y confirmación de seguridad.
- Lógica de integridad en el modelo `User` para prevenir la eliminación de usuarios si poseen registros asociados o perfiles de veterinario vinculados.

### 4. Módulo de Búsqueda en Tiempo Real (Live Search)
- Creación de un sistema de búsqueda en vivo con JavaScript (AJAX) para el módulo de expedientes de pacientes.
- Posibilidad de buscar rápidamente por ID del paciente, nombre de la mascota o nombre del propietario.
- Refinamiento de consultas con relaciones de *Eloquent* en el backend para retornar datos en formato JSON de forma eficiente.

### 5. Refinamiento de la Interfaz (Antecedentes Médicos)
- Reestructuración visual del módulo de Antecedentes (Alergias, Lesiones, Patológicos).
- Transición a un formato de historial basado en tablas (`DataTables`) dentro de cada expediente para una lectura más clara.
- Colocación del botón "Añadir" directamente en la cabecera de las tarjetas (*cards*).
- Estandarización general de los formularios, ajustando la posición de los botones "Guardar" y "Cancelar", y promoviendo diseños de "Ancho Completo" cuando se requiere.
- Limpieza de menús y submenús complejos en el *sidebar* para mejorar la accesibilidad de la navegación (ej. unificando accesos en la sección Usuarios).

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 11.x (PHP 8.2+)
- **Frontend**: Blade, Bootstrap 4 (SB Admin 2), JavaScript
- **Base de Datos**: MySQL / MariaDB
- **Estilos**: CSS3 con separación temática (Navy para Admin, Pink para Veterinarios).
- **Iconografía**: FontAwesome 5

## 📂 Layouts y Perfiles

El sistema ofrece dos experiencias visuales:
1. **Panel de Administración (Tema Navy)**: Gestión global de usuarios, configuraciones, y control del sistema. (Layout: `layouts/admin.blade.php`).
2. **Panel Veterinario (Tema Rosa)**: Gestión de pacientes, historiales, antecedentes y agenda. (Layout: `layouts/app.blade.php`).

## 🚀 Instalación y Uso

1. **Preparar la Base de Datos**:
    ```bash
    php artisan migrate:fresh --seed
    ```

2. **Iniciar Servidor**:
    ```bash
    php artisan serve
    ```

### 🔑 Credenciales de Prueba (Seeder)

| Usuario | Correo | Contraseña | Dashboard |
| :--- | :--- | :--- | :--- |
| **Administrador** | `admin@gmail.com` | `admin` | `/admin/home` |
| **Veterinario** | `veterinario@gmail.com` | `veterinario` | `/home` |

---
*Desarrollado con un enfoque en la eficiencia, seguridad e integridad de los datos para clínicas veterinarias.*
