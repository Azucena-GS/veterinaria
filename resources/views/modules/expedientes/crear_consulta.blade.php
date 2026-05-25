@extends('layouts.app')

@section('ocultar_sidebar', true)

@section('titulo_pagina', 'Nueva Consulta')
@section('titulo_seccion', 'Registrar Nueva Consulta')

@section('acciones_cabecera')
@endsection

@section('contenido')
    <!-- Breadcrumb -->
    <div class="card mb-4 shadow-sm" style="border: none;">
        <div class="card-body py-3">
            <a href="{{ route('expedientes') }}" class="text-primary text-decoration-none">Expedientes</a> 
            <span class="text-muted mx-2">/</span> 
            <a href="{{ route('expedientes.consultas', $mascota->id) }}" class="text-primary text-decoration-none">{{ $mascota->nombre }}</a> 
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Nueva Consulta</span>
        </div>
    </div>

    <div class="row">
        <!-- Detalles Rápidos del Paciente -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow h-100 border-left-info">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-paw fa-3x text-info mr-3"></i>
                        <div>
                            <h4 class="font-weight-bold text-dark mb-0">{{ $mascota->nombre }}</h4>
                            <span class="text-muted small">Folio #{{ $mascota->id }}</span>
                        </div>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><strong>Especie/Raza:</strong> {{ $mascota->especie }} / {{ $mascota->raza ?? 'N/A' }}</li>
                        <li class="mb-2"><strong>Nacimiento:</strong> {{ $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('d/m/Y') : 'Desconocido' }}</li>
                        <li><strong>Dueño:</strong> {{ $mascota->dueno->nombre_completo ?? 'N/A' }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Formulario de Consulta -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Datos Iniciales de la Consulta</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('expedientes.consultas.store', $mascota->id) }}" method="POST">
                        @csrf
                        
                        @if(auth()->user()->rol === 'administrador')
                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle mr-1"></i> <strong>Aviso Administrador:</strong> Debes seleccionar a qué veterinario asignarle esta consulta.
                            </div>
                            <div class="form-group mb-4">
                                <label class="font-weight-bold" for="veterinario_id">Veterinario Asignado <span class="text-danger">*</span></label>
                                <select class="form-control @error('veterinario_id') is-invalid @enderror" id="veterinario_id" name="veterinario_id" required>
                                    <option value="" disabled selected>-- Selecciona un Veterinario --</option>
                                    @foreach($veterinarios as $vet)
                                        <option value="{{ $vet->id }}" {{ old('veterinario_id') == $vet->id ? 'selected' : '' }}>
                                            {{ $vet->nombre_completo }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('veterinario_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @else
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Veterinario Asignado</label>
                                <input type="text" class="form-control @error('veterinario_id') is-invalid @enderror" value="{{ auth()->user()->veterinario->nombre_completo ?? auth()->user()->name }}" readonly>
                                @error('veterinario_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <small class="form-text text-muted">La consulta se asignará automáticamente a tu perfil.</small>
                                @enderror
                            </div>
                        @endif

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="peso">Peso (kg) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" min="0" class="form-control @error('peso') is-invalid @enderror" id="peso" name="peso" value="{{ old('peso') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">kg</span>
                                        </div>
                                        @error('peso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="talla">Talla (cm) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" min="0" class="form-control @error('talla') is-invalid @enderror" id="talla" name="talla" value="{{ old('talla') }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">cm</span>
                                        </div>
                                        @error('talla')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('expedientes.consultas', $mascota->id) }}" class="btn btn-secondary px-4 mr-2">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-stethoscope mr-1"></i> Iniciar Consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
