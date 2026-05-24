@extends('layouts.app')

@section('titulo_pagina', 'Historial Lesiones')
@section('titulo_seccion', 'Historial de Lesiones: ' . $mascota->nombre)

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
            <span class="text-gray-600">Lesiones</span>
        </div>
    </div>

    <!-- Lista de Lesiones -->
    <div class="card shadow mb-4 border-left-info">
        <div class="card-header py-3 bg-white d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Historial de Lesiones Previas</h6>
            <a href="{{ route('expedientes.consultas.lesiones.crear', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Registrar Nueva Lesión
            </a>
        </div>
        <div class="card-body">
            @if($mascota->lesiones->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle mr-2"></i> Esta mascota no tiene registro de lesiones.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Descripción de la Lesión</th>
                                <th>Fecha Registro</th>
                                <th width="10%">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mascota->lesiones as $lesion)
                                <tr>
                                    <td class="font-weight-bold">{{ $lesion->tipo_lesion }}</td>
                                    <td>{{ $lesion->created_at->format('d/m/Y') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('expedientes.consultas.lesiones.delete', [$mascota->id, $consulta->id, $lesion->id]) }}" class="btn btn-danger btn-sm shadow-sm">
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
