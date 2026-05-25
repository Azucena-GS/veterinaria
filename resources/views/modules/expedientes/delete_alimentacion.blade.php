@extends('layouts.app')

@section('titulo_pagina', 'Eliminar Dieta')
@section('titulo_seccion', 'Eliminar Alimentación')

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Volver al Historial
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
            <span class="text-gray-600">Eliminar</span>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow mb-4 border-left-danger">
                <div class="card-header py-3 bg-white">
                    <h6 class="m-0 font-weight-bold text-danger">
                        <i class="fas fa-exclamation-triangle mr-2"></i> Confirmar Eliminación
                    </h6>
                </div>
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-trash-alt fa-4x text-danger opacity-75"></i>
                    </div>
                    
                    <h4 class="font-weight-bold text-gray-800 mb-3">¿Estás seguro?</h4>
                    <p class="text-muted mb-4">
                        Estás a punto de eliminar el siguiente registro de alimentación del historial de <strong>{{ $mascota->nombre }}</strong>. Esta acción no se puede deshacer.
                    </p>
                    
                    <div class="bg-light p-3 rounded text-left mx-auto mb-4" style="max-width: 400px; border: 1px solid #e3e6f0;">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><strong>Descripción:</strong> <span class="text-dark">{{ $alimentacion->descripcion_dieta }}</span></li>
                            <li><strong>Frecuencia diaria:</strong> <span class="text-dark">{{ $alimentacion->frecuencia_diaria }} veces</span></li>
                        </ul>
                    </div>

                    <form action="{{ route('expedientes.consultas.alimentacion.destroy', [$mascota->id, $consulta->id, $alimentacion->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        
                        <div class="d-flex justify-content-center mt-4">
                            <a href="{{ route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id]) }}" class="btn btn-secondary px-4 mr-2">
                                <i class="fas fa-times mr-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-danger px-4">
                                <i class="fas fa-trash mr-1"></i> Sí, Eliminar Registro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
