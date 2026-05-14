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

## 📁 Estructura de Vistas
- `resources/views/layouts/app.blade.php`: Layout para Veterinarios (Rosa).
- `resources/views/layouts/admin.blade.php`: Layout para Administradores (Azul/Navy).
- `resources/views/modules/dashboard/`: Vistas del panel veterinario.
- `resources/views/modules/admin/`: Vistas del panel administrativo.

---
*Desarrollado como parte del sistema de gestión veterinaria.*
