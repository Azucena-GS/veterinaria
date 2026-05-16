{{-- ====================== SIDEBAR ADMINISTRADOR ====================== --}}
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shield-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>

    {{-- Divider --}}
    <hr class="sidebar-divider my-0">

    {{-- Dashboard --}}
    <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">Gestión</div>

    {{-- Nav Item - Usuarios --}}
    <li class="nav-item {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('admin.usuarios.*') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseUsuarios"
            aria-expanded="{{ request()->routeIs('admin.usuarios.*') ? 'true' : 'false' }}" aria-controls="collapseUsuarios">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Usuarios</span>
        </a>
        <div id="collapseUsuarios" class="collapse {{ request()->routeIs('admin.usuarios.*') ? 'show' : '' }}" aria-labelledby="headingUsuarios" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestión de Usuarios:</h6>
                <a class="collapse-item {{ request()->routeIs('admin.usuarios.index') ? 'active' : '' }}" href="{{ route('admin.usuarios.index') }}">Ver todos</a>
                <a class="collapse-item" href="#">Nuevo usuario</a>
            </div>
        </div>
    </li>

    {{-- Nav Item - Veterinarios --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVeterinarios"
            aria-expanded="true" aria-controls="collapseVeterinarios">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Veterinarios</span>
        </a>
        <div id="collapseVeterinarios" class="collapse" aria-labelledby="headingVeterinarios" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Personal:</h6>
                <a class="collapse-item" href="#">Ver veterinarios</a>
                <a class="collapse-item" href="#">Agregar veterinario</a>
            </div>
        </div>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">

    {{-- Heading --}}
    <div class="sidebar-heading">Reportes</div>

    {{-- Nav Item - Reportes --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Estadísticas</span>
        </a>
    </li>

    {{-- Nav Item - Configuración --}}
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Configuración</span>
        </a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
{{-- ====================== END SIDEBAR ADMINISTRADOR ====================== --}}
