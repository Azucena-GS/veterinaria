@extends('layouts.app')

@section('titulo_pagina', 'Registrar Dieta')
@section('titulo_seccion', 'Registrar Alimentación')

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-times fa-sm text-white-50 mr-1"></i> Cancelar
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
            <a href="{{ route('expedientes.consultas.show', [$mascota->id, $consulta->id]) }}" class="text-primary text-decoration-none">Consulta #{{ $consulta->id }}</a>
            <span class="text-muted mx-2">/</span> 
            <a href="{{ route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id]) }}" class="text-primary text-decoration-none">Alimentación</a>
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Registrar</span>
        </div>
    </div>

    <!-- Formulario para Registrar Dieta -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-primary">Detalles de la Alimentación</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('expedientes.consultas.alimentacion.store', [$mascota->id, $consulta->id]) }}" method="POST">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label class="font-weight-bold" for="descripcion_dieta">Descripción de la Dieta <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('descripcion_dieta') is-invalid @enderror" id="descripcion_dieta" name="descripcion_dieta" rows="3" placeholder="Ej. Croquetas Royal Canin, Dieta BARF, Pollo hervido con arroz..." required>{{ old('descripcion_dieta') }}</textarea>
                            @error('descripcion_dieta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Especifica el tipo de comida, marca o preparación que consume habitualmente.</small>
                        </div>
                        
                        <div class="form-group mb-4">
                            <label class="font-weight-bold" for="frecuencia_diaria">Frecuencia Diaria (veces al día) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('frecuencia_diaria') is-invalid @enderror" id="frecuencia_diaria" name="frecuencia_diaria" value="{{ old('frecuencia_diaria') }}" min="1" required>
                            @error('frecuencia_diaria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Cuántas veces al día se alimenta la mascota.</small>
                        </div>
                        
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id]) }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Guardar Dieta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
