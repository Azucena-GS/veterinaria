# 🐾 Sistema de Gestión Veterinaria - SB Admin 2

Este es un sistema integral de gestión para clínicas veterinarias desarrollado con **Laravel 11**. Utiliza una interfaz moderna basada en la plantilla **SB Admin 2**, con personalizaciones visuales únicas para cada rol de usuario.

## 🌟 Características Principales

### 🔐 Autenticación Avanzada
- **Sistema de Login Seguro**: Implementado con protección de rutas y manejo de sesiones.
- **Redirección Basada en Roles**: El sistema detecta automáticamente si el usuario es un administrador o un veterinario.
- **Seguridad**: Middleware de autenticación y validación de roles en controladores.

### 👥 Multi-Perfil (Dashboards Personalizados)
El sistema ofrece dos experiencias visuales y funcionales distintas:

1.  **Panel de Administración (Tema Navy/Dark)**:
    - Gestión global de usuarios.
    - Control de personal veterinario.
    - Estadísticas generales e informes.
    - Layout exclusivo: `resources/views/layouts/admin.blade.php`.
    - Sidebar con gradiente oscuro profesional.

2.  **Panel Veterinario (Tema Rosa/Pink)**:
    - Gestión de pacientes (mascotas).
    - Agenda de citas.
    - Control de propietarios.
    - Inventario de insumos.
    - Layout exclusivo: `resources/views/layouts/app.blade.php`.
    - Sidebar rosa personalizado para identidad de marca.

## 🛠️ Stack Tecnológico

- **Backend**: Laravel 11.x (PHP 8.2+)
- **Frontend**: Blade, Bootstrap 4 (SB Admin 2)
- **Base de Datos**: MySQL / MariaDB
- **Estilos**: CSS3 personalizado (Temas duales Navy y Pink)
- **Iconografía**: FontAwesome 5

## 📂 Estructura del Proyecto

### Controladores Clave
- `AuthController.php`: Gestiona el inicio de sesión, cierre de sesión y redirección inteligente.
- `AdminController.php`: Gestiona las vistas y lógica exclusivas del administrador.

### Rutas
- `/`: Inicio de sesión.
- `/home`: Dashboard del Veterinario (protegido por `auth`).
- `/admin/home`: Dashboard del Administrador (protegido por `auth` + validación de rol).
- `/logout`: Cierre de sesión seguro.

## 🚀 Instalación y Uso

1.  **Preparar la Base de Datos**:
    ```bash
    php artisan migrate:fresh --seed
    ```

2.  **Iniciar Servidor**:
    ```bash
    php artisan serve
    ```

### 🔑 Credenciales de Prueba (Seeder)

| Usuario | Correo | Contraseña | Dashboard |
| :--- | :--- | :--- | :--- |
| **Administrador** | `admin@gmail.com` | `admin` | `/admin/home` |
| **Veterinario** | `veterinario@gmail.com` | `veterinario` | `/home` |

## 🎨 Personalización Visual
Se han implementado hojas de estilo separadas para mantener la coherencia visual:
- `public/css/veterinaria.css`: Define el estilo rosa para el personal médico.
- `public/css/admin.css`: Define el estilo azul marino para el área administrativa.

---
*Desarrollado con enfoque en la eficiencia y experiencia de usuario para clínicas veterinarias modernas.*
