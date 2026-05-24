@extends('layouts.app')

@section('titulo_pagina', 'Patológicos')
@section('titulo_seccion', 'Antecedentes: Patológicos')



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
            <a href="{{ route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id]) }}" class="text-primary text-decoration-none">Patológicos</a>
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Registrar</span>
        </div>
    </div>

    <!-- Formulario para agregar antecedente patológico (Ancho Completo) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Registrar Antecedente Patológico</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('expedientes.consultas.patologicos.store', [$mascota->id, $consulta->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="small font-weight-bold">Nombre de la Enfermedad</label>
                    <input type="text" name="enfermedad" class="form-control" placeholder="Ej. Moquillo, Parvovirus ..." required>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="es_cronica" name="es_cronica" value="1">
                        <label class="custom-control-label" for="es_cronica">Es una enfermedad crónica</label>
                    </div>
                </div>
                <div class="text-right mt-3">
                    <a href="{{ route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id]) }}" class="btn btn-secondary px-4 shadow-sm mr-2">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-plus mr-1"></i> Guardar Antecedente
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
