@extends('layouts.app')

@section('titulo_pagina', 'Alergias')
@section('titulo_seccion', 'Antecedentes: Alergias')



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
            <a href="{{ route('expedientes.consultas.alergias', [$mascota->id, $consulta->id]) }}" class="text-primary text-decoration-none">Alergias</a>
            <span class="text-muted mx-2">/</span> 
            <span class="text-gray-600">Registrar</span>
        </div>
    </div>

    <!-- Formulario para agregar alergia (Ancho Completo) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-white">
            <h6 class="m-0 font-weight-bold text-primary">Registrar Nueva Alergia</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('expedientes.consultas.alergias.store', [$mascota->id, $consulta->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="small font-weight-bold">Sustancia Alérgena</label>
                    <input type="text" name="sustancia_alergena" class="form-control" placeholder="Ej. Penicilina, Pollo, etc." required>
                </div>
                <div class="form-group">
                    <label class="small font-weight-bold">Reacción Presentada</label>
                    <textarea name="reaccion" class="form-control" rows="3" placeholder="Describa los síntomas..." required></textarea>
                </div>
                <div class="text-right mt-3">
                    <a href="{{ route('expedientes.consultas.alergias', [$mascota->id, $consulta->id]) }}" class="btn btn-secondary px-4 shadow-sm mr-2">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-plus mr-1"></i> Guardar Alergia
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
