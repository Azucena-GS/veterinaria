@extends('layouts.app')

@section('titulo_pagina', 'Detalle de Consulta')
@section('titulo_seccion', 'Detalle de Consulta')

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas', $mascota->id) }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Volver
    </a>
@endsection

@section('contenido')

    <!-- Breadcrumb -->
    <div class="card mb-4 shadow-sm" style="border: none;">
        <div class="card-body py-3">
            <a href="{{ route('expedientes') }}" class="text-primary text-decoration-none">Expedientes</a> 
            <span class="text-muted mx-2">/</span> 
            <a href="{{ route('expedientes.consultas', $mascota->id) }}" class="text-primary text-decoration-none">{{ $mascota->nombre }}</a> 
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Consulta #{{ $consulta->id }}</span>
        </div>
    </div>

    <!-- Tarjeta Principal del Paciente (Mascota y Dueño) -->
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body d-flex justify-content-between align-items-center">
            <!-- Info Mascota -->
            <div class="d-flex align-items-center">
                <div class="mr-4">
                    <i class="fas fa-paw fa-3x text-primary"></i>
                </div>
                <div>
                    <h4 class="font-weight-bold text-dark mb-1">{{ $mascota->nombre }}</h4>
                    <span class="text-muted small">
                        Folio #{{ $mascota->id }} &bull; 
                        {{ $mascota->especie }} / {{ $mascota->raza ?? 'Mestizo' }} &bull; 
                        Tipo de sangre: {{ $mascota->tipo_sangre ?? 'Desconocido' }}
                    </span>
                </div>
            </div>
            <!-- Info Dueño -->
            <div class="text-right">
                <div class="text-xs font-weight-bold text-uppercase text-muted mb-1">DUEÑO</div>
                <div class="h6 font-weight-bold text-dark mb-1">
                    <i class="fas fa-user text-muted mr-1"></i> {{ $mascota->dueno->nombre_completo ?? 'N/A' }}
                </div>
                <div class="text-muted small">
                    <i class="fas fa-phone-alt mr-1"></i> {{ $mascota->dueno->telefono ?? 'N/A' }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Tarjeta Consulta (Izquierda) -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between border-bottom-0 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-stethoscope mr-2"></i>Consulta #{{ $consulta->id }}</h6>
                    <span class="badge badge-primary px-3 py-2" style="font-size: 0.9rem;">{{ $consulta->fecha_consulta->format('d/m/Y h:i') }}</span>
                </div>
                <div class="card-body bg-light pt-4">
                    <!-- Tarjetas pequeñas de la consulta -->
                    <div class="row text-center mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center">
                                    <div class="text-xs font-weight-bold text-uppercase text-muted mb-3">VETERINARIO</div>
                                    <div class="h5 mb-0 font-weight-bold text-info">
                                        <i class="fas fa-user-md mr-2"></i>{{ $consulta->veterinario->user->name ?? '—' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center">
                                    <div class="text-xs font-weight-bold text-uppercase text-muted mb-3">PESO</div>
                                    <div class="h4 mb-0 font-weight-bold text-dark">{{ $consulta->peso }} kg</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body py-4 d-flex flex-column justify-content-center">
                                    <div class="text-xs font-weight-bold text-uppercase text-muted mb-3">TALLA</div>
                                    <div class="h4 mb-0 font-weight-bold text-dark">{{ $consulta->talla }} cm</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Datos del Paciente (Derecha) -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-4 bg-white border-bottom-0">
                    <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-info-circle mr-2"></i>Datos del Paciente</h6>
                </div>
                <div class="card-body pt-0">
                    <div class="mb-4">
                        <div class="text-xs font-weight-bold text-uppercase text-muted mb-2">FECHA DE NACIMIENTO</div>
                        <div class="h6 text-dark mb-0">{{ $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('d/m/Y') : 'N/A' }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="text-xs font-weight-bold text-uppercase text-muted mb-2">TIPO DE SANGRE</div>
                        <div class="h6 text-dark mb-0">{{ $mascota->tipo_sangre ?? 'N/A' }}</div>
                    </div>
                    <div class="mb-4">
                        <div class="text-xs font-weight-bold text-uppercase text-muted mb-2">COMPORTAMIENTO</div>
                        <div class="h6 text-dark mb-0">{{ $mascota->comportamiento ?? 'N/A' }}</div>
                    </div>
                    <div class="mb-0">
                        <div class="text-xs font-weight-bold text-uppercase text-muted mb-2">ADOPTADO</div>
                        <div>
                            @if($mascota->es_adoptado)
                                <span class="badge badge-success px-3 py-2" style="font-size: 0.85rem;">Sí</span>
                            @else
                                <span class="badge badge-secondary px-3 py-2" style="font-size: 0.85rem;">No</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
