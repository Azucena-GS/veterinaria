# Sistema de Gestión Veterinaria

Este proyecto es un sistema de gestión para una veterinaria desarrollado con Laravel 11, utilizando el diseño de **SB Admin 2**.

## 🚀 Últimas Actualizaciones

### Sistema de Autenticación y Roles
Se ha implementado una lógica de redirección basada en roles para diferenciar la experiencia de usuario entre administradores y veterinarios.

- **Campo `rol`**: Se añadió a la migración de la tabla `users` como un `enum` con valores `administrador` y `veterinario`.
- **Redirección Post-Login**:
    - **Administrador**: Redirige a `/admin/home`.
    - **Veterinario**: Redirige a `/home`.

### Panel de Administración (NUEVO)
Se creó una sección exclusiva para el administrador con las siguientes características:
- **Layout Personalizado**: `layouts/admin.blade.php` con paleta de colores azul marino (Navy).
- **Sidebar Admin**: Menú diferenciado con acceso a gestión de usuarios, personal veterinario y estadísticas.
- **Dashboard Admin**: Tarjetas de resumen (Usuarios, Ingresos, Reportes) y tabla de gestión de usuarios.
- **Protección de Rutas**: Implementación de seguridad en controladores para evitar acceso cruzado entre roles.

### Panel de Veterinario (Existente)
- Se mantiene el dashboard enfocado en la gestión de pacientes y citas con el tema visual rosa original.

## 🛠️ Instalación y Configuración

1.  **Migrar y Sembrar**:
    Ejecuta el siguiente comando para preparar la base de datos con los nuevos campos y usuarios de prueba:
    ```bash
    php artisan migrate:fresh --seed
    ```

2.  **Usuarios de Prueba**:
    | Rol | Correo | Contraseña |
    | :--- | :--- | :--- |
    | **Administrador** | `admin@gmail.com` | `admin` |
    | **Veterinario** | `veterinario@gmail.com` | `veterinario` |

## 🛠️ Tecnologías Utilizadas

- **Framework**: Laravel 11.x
- **Lenguaje**: PHP 8.2+
- **Base de Datos**: MySQL / MariaDB
- **Frontend**: Blade Templates, SB Admin 2 (Bootstrap 4)
- **Estilos**: CSS3 personalizado (Temas Rosa y Navy)

## 📁 Estructura del Proyecto (Módulos Nuevos)

El sistema ahora cuenta con una arquitectura modular para los roles:

```text
resources/views/
├── layouts/
│   ├── app.blade.php          # Layout Veterinario (Rosa)
│   ├── admin.blade.php        # Layout Administrador (Navy)
│   ├── partials/              # Componentes Veterinario
│   └── admin-partials/        # Componentes Administrador
├── modules/
│   ├── auth/                  # Vistas de Inicio de Sesión
│   ├── dashboard/             # Dashboard Veterinario
│   └── admin/
│       └── dashboard/         # Dashboard Administrador
```

## ⚙️ Requerimientos

- PHP >= 8.2
- Composer
- Node.js & NPM (opcional para assets)
- MySQL/SQLite

---
*Desarrollado con ❤️ para la Gestión Veterinaria.*
