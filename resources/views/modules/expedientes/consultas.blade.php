@extends('layouts.app')

@section('ocultar_sidebar', true)

@section('titulo_pagina', 'Historial de Consultas')
@section('titulo_seccion', 'Consultas de ' . $mascota->nombre)

@section('acciones_cabecera')
    <a href="{{ route('expedientes') }}" class="btn btn-sm btn-secondary shadow-sm mr-2">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver
    </a>
    <a href="#" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Nueva Consulta
    </a>
@endsection

@section('contenido')
    <div class="row">
        <!-- Detalles del Paciente -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Información del Paciente</h6>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4 rounded-circle" style="width: 15rem;"
                            src="{{ asset('startbootstrap/img/undraw_posting_photo.svg') }}" alt="Foto Mascota">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Nombre:</strong> <span>{{ $mascota->nombre }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Especie / Raza:</strong> <span>{{ $mascota->especie }} / {{ $mascota->raza ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Dueño:</strong> <span>{{ $mascota->dueno->nombre_completo ?? 'Desconocido' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Folio:</strong> <span>#{{ $mascota->id }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Historial de Consultas -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Historial Médico</h6>
                </div>
                <div class="card-body">
                    @if($mascota->consultas->isEmpty())
                        <div class="alert alert-info">
                            Esta mascota aún no tiene consultas registradas.
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Veterinario</th>
                                        <th>Peso</th>
                                        <th>Talla</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mascota->consultas as $consulta)
                                        <tr>
                                            <td>{{ $consulta->fecha_consulta->format('d/m/Y h:i A') }}</td>
                                            <td>{{ $consulta->veterinario->user->name ?? 'N/A' }}</td>
                                            <td>{{ $consulta->peso }} kg</td>
                                            <td>{{ $consulta->talla }} cm</td>
                                            <td>
                                                <a href="{{ route('expedientes.consultas.show', ['mascota' => $mascota->id, 'consulta' => $consulta->id]) }}" class="btn btn-info btn-sm" title="Ver Detalles">
                                                    <i class="fas fa-eye"></i>
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
        </div>
    </div>
@endsection
