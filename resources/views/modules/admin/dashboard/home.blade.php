@extends('layouts.admin')

@section('titulo_pagina', 'Dashboard Administrador')
@section('titulo_seccion', 'Panel de Administración')

@section('acciones_cabecera')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
        <i class="fas fa-file-export fa-sm text-white-50"></i> Exportar Reporte
    </a>
@endsection

@section('contenido')

    {{-- Banner de Bienvenida Administrador --}}
    <div class="row mb-5">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                <div class="card-body p-5 position-relative">
                    {{-- Fondo decorativo --}}
                    <i class="fas fa-shield-alt position-absolute text-white" style="font-size: 15rem; top: -2rem; right: -2rem; opacity: 0.05;"></i>
                    
                    <div class="row align-items-center">
                        <div class="col-md-9 text-white text-center text-md-left">
                            <div class="mb-2">
                                <span class="badge badge-light text-dark px-3 py-2 text-uppercase mb-3" style="font-size: 0.8rem; letter-spacing: 1px;">Panel de Control Administrativo</span>
                            </div>
                            <h1 class="display-4 font-weight-bold mb-2" style="font-size: 2.2rem;">
                                Bienvenido de nuevo, {{ Auth::user()->name }}
                            </h1>
                            <p class="lead mb-4 font-weight-light" style="opacity: 0.9; font-size: 1.1rem;">
                                Tienes el control total sobre <strong>{{ $config->nombre_clinica ?? 'la Veterinaria' }}</strong>. 
                                Desde aquí puedes supervisar usuarios, ingresos y la configuración general del sistema.
                            </p>
                        </div>
                        <div class="col-md-3 text-center d-none d-md-block">
                            @if(isset($config) && $config->logo_path)
                                <img src="{{ asset('uploads/config/' . $config->logo_path) }}" alt="Logo" class="img-fluid shadow" style="max-height: 140px; border-radius: 50%; border: 4px solid rgba(255,255,255,0.2);">
                            @else
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 140px; height: 140px; border: 4px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.1);">
                                    <i class="fas fa-user-shield fa-4x text-white"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Tarjetas de resumen --}}
    <div class="row">

        {{-- Usuarios registrados --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Usuarios Totales</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['usuarios'] ?? 0 }}</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['veterinarios'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pacientes --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pacientes en Sistema</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['pacientes'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-paw fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Consultas --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consultas Históricas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stats['consultas'] ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-medical-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Tabla de usuarios removida por petición del usuario --}}

@endsection
