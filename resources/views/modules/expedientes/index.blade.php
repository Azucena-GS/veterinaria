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
                    <div class="row justify-content-center py-5">
                        <div class="col-md-8 text-center">
                            
                            <h4 class="mb-4 text-gray-800">Buscar Expediente</h4>
                            
                            {{-- Buscador --}}
                            <div class="input-group input-group-lg mb-4 shadow-sm">
                                <input type="text" class="form-control" placeholder="Buscar por nombre del paciente, dueño, teléfono..." aria-label="Buscar" aria-describedby="btnBuscador">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4" type="button" id="btnBuscador">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            
                            {{-- Botones de acción --}}
                            <div class="d-flex justify-content-center mt-4">
                                <button type="button" class="btn btn-lg btn-outline-primary mx-2 shadow-sm">
                                    <i class="fas fa-file-medical-alt mr-2"></i>Ver Consultas
                                </button>
                                <button type="button" class="btn btn-lg btn-success mx-2 shadow-sm">
                                    <i class="fas fa-plus-circle mr-2"></i>Nuevo Paciente/Mascota
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
