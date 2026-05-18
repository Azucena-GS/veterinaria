@extends('layouts.app')

@section('ocultar_sidebar', true)

@section('titulo_pagina', 'Expedientes')
@section('titulo_seccion', 'Gestión de Expedientes')

@section('acciones_cabecera')
    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary shadow-sm mr-2">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver al Inicio
    </a>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-folder-open mr-2"></i>Expedientes Médicos
                    </h6>
                    <a href="#" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus fa-sm mr-1"></i> Nuevo Expediente
                    </a>
                </div>
                <div class="card-body">
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-folder-open fa-3x mb-3 text-gray-300"></i>
                        <p class="mt-3">Módulo de expedientes en construcción.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
