{{-- ====================== TOPBAR ADMINISTRADOR ====================== --}}
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    {{-- Sidebar Toggle (Mobile) --}}
    @unless(View::hasSection('ocultar_sidebar'))
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    @endunless

    {{-- Topbar Brand Label --}}
    <span class="d-none d-sm-inline-block font-weight-bold text-dark ml-2">
        <i class="fas fa-shield-alt text-dark mr-1"></i> Panel de Administración
    </span>

    {{-- Topbar Navbar --}}
    <ul class="navbar-nav ml-auto">

        {{-- Divider --}}
        <div class="topbar-divider d-none d-sm-block"></div>

        {{-- Badge de Rol --}}
        <li class="nav-item d-flex align-items-center mr-3">
            <span class="badge badge-dark px-3 py-2">
                <i class="fas fa-user-shield mr-1"></i> Administrador
            </span>
        </li>

        {{-- User Dropdown --}}
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdownAdmin" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ Auth::user()->name ?? 'Administrador' }}
                </span>
                <img class="img-profile rounded-circle"
                    src="{{ asset('startbootstrap/img/undraw_profile.svg') }}" alt="perfil">
            </a>
            {{-- Dropdown - User Information --}}
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdownAdmin">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Mi Perfil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar Sesión
                </a>
            </div>
        </li>

    </ul>

</nav>
{{-- ====================== END TOPBAR ADMINISTRADOR ====================== --}}
