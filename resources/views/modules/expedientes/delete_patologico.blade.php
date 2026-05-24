@extends('layouts.app')

@section('titulo_pagina', 'Eliminar Patológico')
@section('titulo_seccion', 'Detalles y Eliminación de Antecedente Patológico')

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Volver a la Lista
    </a>
@endsection

@section('contenido')
    <!-- Breadcrumb -->
    <div class="card mb-4 shadow-sm" style="border: none;">
        <div class="card-body py-3">
            <a href="{{ route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id]) }}" class="text-primary text-decoration-none">Historial de Patológicos</a> 
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Eliminar Patológico</span>
        </div>
    </div>

    <div class="row">
        <!-- Columna Izquierda: Información -->
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-info-circle mr-2"></i>Información del Antecedente</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Paciente:</strong> {{ $mascota->nombre }}</li>
                        <li class="list-group-item"><strong>Enfermedad:</strong> {{ $patologico->enfermedad }}</li>
                        <li class="list-group-item"><strong>¿Es Crónica?:</strong> 
                            @if($patologico->es_cronica)
                                <span class="badge badge-warning">Sí</span>
                            @else
                                <span class="badge badge-secondary">No</span>
                            @endif
                        </li>
                        <li class="list-group-item"><strong>Fecha de Registro:</strong> {{ $patologico->created_at->format('d/m/Y H:i') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Columna Derecha: Zona de Peligro -->
        <div class="col-lg-6">
            <div class="card shadow mb-4 border-left-danger">
                <div class="card-header py-3 text-danger bg-white border-bottom-0">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-exclamation-triangle mr-2"></i>Zona de Peligro</h6>
                </div>
                <div class="card-body">
                    <p class="text-gray-700">
                        Estás a punto de eliminar este antecedente patológico del sistema. Esta acción <strong>no se puede deshacer</strong> y eliminará permanentemente la información del historial clínico de la mascota.
                    </p>
                    
                    <div class="alert alert-danger" style="background-color: #f8d7da; border-color: #f5c6cb; color: #721c24;">
                        <i class="fas fa-exclamation-circle mr-2"></i> <strong>Atención:</strong> Si eliminas este registro, ya no aparecerá en futuras consultas.
                    </div>

                    <form action="{{ route('expedientes.consultas.patologicos.destroy', [$mascota->id, $consulta->id, $patologico->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row mt-4">
                            <div class="col-sm-6 mb-2 mb-sm-0">
                                <a href="{{ route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id]) }}" class="btn btn-secondary btn-block shadow-sm py-2 font-weight-bold">
                                    <i class="fas fa-times mr-2"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-danger btn-block shadow-sm py-2 text-uppercase font-weight-bold" style="background-color: #e74a3b;">
                                    <i class="fas fa-trash-alt mr-2"></i> Eliminar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
