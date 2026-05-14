<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Veterinaria">
    <meta name="author" content="">

    <title>@yield('titulo_pagina', 'Veterinaria') - Sistema</title>

    {{-- FontAwesome --}}
    <link href="{{ asset('startbootstrap/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- SB Admin 2 CSS --}}
    <link href="{{ asset('startbootstrap/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- Tema personalizado rosa --}}
    <link href="{{ asset('css/veterinaria.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body id="page-top">

    {{-- ======================================================
         PAGE WRAPPER
    ====================================================== --}}
    <div id="wrapper">

        {{-- SIDEBAR --}}
        @include('layouts.partials.sidebar')

        {{-- CONTENT WRAPPER --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- MAIN CONTENT --}}
            <div id="content">

                {{-- TOPBAR --}}
                @include('layouts.partials.topbar')

                {{-- PAGE CONTENT --}}
                <div class="container-fluid">

                    {{-- Encabezado de sección --}}
                    @hasSection('titulo_seccion')
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">@yield('titulo_seccion')</h1>
                            @yield('acciones_cabecera')
                        </div>
                    @endif

                    {{-- Alertas de sesión --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif

                    {{-- CONTENIDO PRINCIPAL --}}
                    @yield('contenido')

                </div>
                {{-- /.container-fluid --}}

            </div>
            {{-- END MAIN CONTENT --}}

            {{-- FOOTER --}}
            @include('layouts.partials.footer')

        </div>
        {{-- END CONTENT WRAPPER --}}

    </div>
    {{-- END PAGE WRAPPER --}}

    {{-- Scroll to Top --}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Modal Logout --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        <i class="fas fa-sign-out-alt mr-2"></i>¿Cerrar sesión?
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Selecciona <strong>"Salir"</strong> si deseas terminar tu sesión actual.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt mr-1"></i> Salir
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap core JS --}}
    <script src="{{ asset('startbootstrap/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('startbootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Core plugin JS --}}
    <script src="{{ asset('startbootstrap/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- SB Admin 2 JS --}}
    <script src="{{ asset('startbootstrap/js/sb-admin-2.min.js') }}"></script>

    @stack('scripts')

</body>

</html>
