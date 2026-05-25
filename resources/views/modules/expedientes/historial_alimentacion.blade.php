@extends('layouts.app')

@section('titulo_pagina', 'Historial de Alimentación')
@section('titulo_seccion', 'Historial de Alimentación: ' . $mascota->nombre)

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas.show', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Volver a la Consulta
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
            <span class="text-gray-600">Alimentación</span>
        </div>
    </div>

    <!-- Lista de Alimentación -->
    <div class="card shadow mb-4 border-left-info">
        <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Historial de Alimentación (Global de la mascota)</h6>
            <a href="{{ route('expedientes.consultas.alimentacion.crear', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Registrar Nueva Dieta
            </a>
        </div>
        <div class="card-body">
            @if($mascota->historial_alimentacion->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i> Esta mascota no tiene un historial de alimentación registrado.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Descripción de Dieta</th>
                                <th width="20%">Frecuencia (veces al día)</th>
                                <th width="15%">Fecha Registro</th>
                                <th width="10%">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascota->historial_alimentacion as $dieta)
                                <tr>
                                    <td class="font-weight-bold">{{ $dieta->descripcion_dieta }}</td>
                                    <td class="text-center">{{ $dieta->frecuencia_diaria }}</td>
                                    <td>{{ $dieta->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('expedientes.consultas.alimentacion.delete', [$mascota->id, $consulta->id, $dieta->id]) }}" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
