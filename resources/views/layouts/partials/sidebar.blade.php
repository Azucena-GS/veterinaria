{{-- ====================== SIDEBAR ====================== --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-paw"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Veterinaria</div>
    </a>

    {{-- Divider --}}
    <hr class="sidebar-divider my-0">

    @if(request()->routeIs('expedientes.consultas.*') && request()->route('consulta'))
        {{-- ================= MENU DE DETALLE DE CONSULTA ================= --}}
        
        <div class="sidebar-heading mt-3 text-uppercase" style="font-size: 0.7rem; opacity: 0.8;">CONSULTA</div>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.diagnostico') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.diagnostico', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Diagnóstico</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.tratamiento') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.tratamiento', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-stethoscope"></i>
                <span>Tratamiento</span>
            </a>
        </li>

        <hr class="sidebar-divider mt-2 mb-2 border-light" style="opacity: 0.2;">

        <div class="sidebar-heading text-uppercase" style="font-size: 0.7rem; opacity: 0.8;">ANTECEDENTES</div>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.alergias') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.alergias', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-hand-paper"></i>
                <span>Alergias</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.lesiones') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.lesiones', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-band-aid"></i>
                <span>Lesiones</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.patologicos') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.patologicos', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-viruses"></i>
                <span>Patológicos</span>
            </a>
        </li>

        <hr class="sidebar-divider mt-2 mb-2 border-light" style="opacity: 0.2;">

        <div class="sidebar-heading text-uppercase" style="font-size: 0.7rem; opacity: 0.8;">HISTORIAL</div>

        <li class="nav-item {{ request()->routeIs('expedientes.consultas.alimentacion') ? 'active' : '' }}">
            <a class="nav-link py-2" href="{{ route('expedientes.consultas.alimentacion', ['mascota' => request()->route('mascota'), 'consulta' => request()->route('consulta')]) }}">
                <i class="fas fa-fw fa-utensils"></i>
                <span>Alimentación</span>
            </a>
        </li>

    @else
        {{-- ================= MENU PRINCIPAL POR DEFECTO ================= --}}

        {{-- Dashboard --}}
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Divider --}}
        <hr class="sidebar-divider">

        {{-- Heading --}}
        <div class="sidebar-heading">Gestión</div>

        {{-- Nav Item - Pacientes --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePacientes"
                aria-expanded="true" aria-controls="collapsePacientes">
                <i class="fas fa-fw fa-dog"></i>
                <span>Pacientes</span>
            </a>
            <div id="collapsePacientes" class="collapse" aria-labelledby="headingPacientes" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Mascotas:</h6>
                    <a class="collapse-item" href="#">Ver todos</a>
                    <a class="collapse-item" href="#">Nuevo paciente</a>
                </div>
            </div>
        </li>

        {{-- Nav Item - Citas --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCitas"
                aria-expanded="true" aria-controls="collapseCitas">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Citas</span>
            </a>
            <div id="collapseCitas" class="collapse" aria-labelledby="headingCitas" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Agenda:</h6>
                    <a class="collapse-item" href="#">Ver citas</a>
                    <a class="collapse-item" href="#">Nueva cita</a>
                </div>
            </div>
        </li>

        {{-- Divider --}}
        <hr class="sidebar-divider">

        {{-- Heading --}}
        <div class="sidebar-heading">Administración</div>

        {{-- Nav Item - Propietarios --}}
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-users"></i>
                <span>Propietarios</span>
            </a>
        </li>

        {{-- Nav Item - Inventario --}}
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Inventario</span>
            </a>
        </li>
    @endif

    {{-- Divider --}}
    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
{{-- ====================== END SIDEBAR ====================== --}}
