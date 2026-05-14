@extends('layouts.admin')

@section('titulo_pagina', 'Dashboard Administrador')
@section('titulo_seccion', 'Panel de Administración')

@section('acciones_cabecera')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
        <i class="fas fa-file-export fa-sm text-white-50"></i> Exportar Reporte
    </a>
@endsection

@section('contenido')

    {{-- Tarjetas de resumen --}}
    <div class="row">

        {{-- Usuarios registrados --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Veterinarios activos --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Veterinarios Activos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ingresos del mes --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ingresos del Mes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$0.00</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reportes pendientes --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Reportes Pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Bienvenida administrador --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <i class="fas fa-shield-alt mr-2 text-dark"></i>
                    <h6 class="m-0 font-weight-bold text-dark">Bienvenido al Panel de Administración</h6>
                </div>
                <div class="card-body">
                    <p class="mb-1">
                        Bienvenido, <strong>{{ Auth::user()->name }}</strong>.
                        Desde aquí puedes gestionar todos los aspectos del sistema veterinario.
                    </p>
                    <p class="mb-0 text-muted small">
                        <i class="fas fa-info-circle mr-1"></i>
                        Usa el menú lateral para navegar entre las secciones de administración.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabla de usuarios del sistema --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">
                        <i class="fas fa-users-cog mr-2"></i>Usuarios del Sistema
                    </h6>
                    <a href="#" class="btn btn-sm btn-dark">
                        <i class="fas fa-plus fa-sm mr-1"></i> Nuevo Usuario
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTableUsuarios" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        <i class="fas fa-info-circle mr-1"></i> Sin usuarios registrados aún.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
