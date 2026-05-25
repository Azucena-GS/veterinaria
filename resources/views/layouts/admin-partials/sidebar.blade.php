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
        <a class="nav-link" href="{{ route('admin.usuarios.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Usuarios</span>
        </a>
    </li>


    {{-- Nav Item - Configuración --}}
    <li class="nav-item {{ request()->routeIs('admin.configuracion.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.configuracion.index') }}">
            <i class="fas fa-fw fa-cogs"></i>
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
