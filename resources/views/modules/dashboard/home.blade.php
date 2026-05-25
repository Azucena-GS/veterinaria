@extends('layouts.app')

@section('ocultar_sidebar', false)

@section('titulo_pagina', 'Inicio')
@section('titulo_seccion', 'Panel Principal')

@section('contenido')

    {{-- Banner de Bienvenida Mejorado --}}
    <div class="row mb-5">
        <div class="col-xl-10 mx-auto">
            <div class="card shadow-lg border-0" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);">
                <div class="card-body p-5 position-relative">
                    {{-- Fondo decorativo --}}
                    <i class="fas fa-heartbeat position-absolute text-white" style="font-size: 15rem; top: -2rem; right: -2rem; opacity: 0.05;"></i>
                    
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-4 mb-md-0">
                            @if($config && $config->logo_path)
                                <img src="{{ asset('uploads/config/' . $config->logo_path) }}" alt="Logo" class="img-fluid shadow" style="max-height: 160px; border-radius: 50%; border: 5px solid rgba(255,255,255,0.2);">
                            @else
                                <div class="rounded-circle d-inline-flex align-items-center justify-content-center shadow" style="width: 160px; height: 160px; border: 5px solid rgba(255,255,255,0.2); background: rgba(255,255,255,0.1);">
                                    <i class="fas fa-clinic-medical fa-5x text-white"></i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-9 text-white text-center text-md-left">
                            <h1 class="display-4 font-weight-bold mb-2" style="font-size: 2.5rem;">
                                ¡Bienvenido a {{ $config->nombre_clinica ?? 'Veterinaria' }}!
                            </h1>
                            <p class="lead mb-4 font-weight-light" style="opacity: 0.9; font-size: 1.2rem;">
                                Hola <strong>{{ Auth::user()->name }}</strong>. Es un excelente día para seguir cuidando de la salud y el bienestar de nuestras mascotas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Información de la Clínica (Acordeón) --}}
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <h4 class="text-gray-800 font-weight-bold mb-4 text-center">Acerca de Nosotros</h4>
            
            <div class="accordion shadow-sm" id="accordionConfig" style="border-radius: 15px; overflow: hidden;">
                
                {{-- Misión --}}
                <div class="card border-bottom">
                    <div class="card-header bg-white p-0 border-0" id="headingMision">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-gray-800 font-weight-bold p-4 text-decoration-none d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapseMision" aria-expanded="true" aria-controls="collapseMision">
                                <span style="font-size: 1.1rem;"><i class="fas fa-bullseye text-primary mr-3 fa-lg"></i> Nuestra Misión</span>
                                <i class="fas fa-plus text-primary icon-toggle"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseMision" class="collapse show" aria-labelledby="headingMision" data-parent="#accordionConfig">
                        <div class="card-body text-gray-700 bg-light p-4" style="font-size: 1.05rem; line-height: 1.6;">
                            {{ $config->mision ?? 'Información no registrada.' }}
                        </div>
                    </div>
                </div>

                {{-- Visión --}}
                <div class="card border-bottom">
                    <div class="card-header bg-white p-0 border-0" id="headingVision">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-gray-800 font-weight-bold p-4 text-decoration-none d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseVision" aria-expanded="false" aria-controls="collapseVision">
                                <span style="font-size: 1.1rem;"><i class="fas fa-eye text-primary mr-3 fa-lg"></i> Nuestra Visión</span>
                                <i class="fas fa-plus text-primary icon-toggle"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseVision" class="collapse" aria-labelledby="headingVision" data-parent="#accordionConfig">
                        <div class="card-body text-gray-700 bg-light p-4" style="font-size: 1.05rem; line-height: 1.6;">
                            {{ $config->vision ?? 'Información no registrada.' }}
                        </div>
                    </div>
                </div>

                {{-- Valores --}}
                <div class="card border-bottom">
                    <div class="card-header bg-white p-0 border-0" id="headingValores">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-gray-800 font-weight-bold p-4 text-decoration-none d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseValores" aria-expanded="false" aria-controls="collapseValores">
                                <span style="font-size: 1.1rem;"><i class="fas fa-hands-helping text-primary mr-3 fa-lg"></i> Valores Institucionales</span>
                                <i class="fas fa-plus text-primary icon-toggle"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseValores" class="collapse" aria-labelledby="headingValores" data-parent="#accordionConfig">
                        <div class="card-body text-gray-700 bg-light p-4" style="font-size: 1.05rem; line-height: 1.6;">
                            {{ $config->valores ?? 'Información no registrada.' }}
                        </div>
                    </div>
                </div>

                {{-- Historia --}}
                <div class="card border-bottom">
                    <div class="card-header bg-white p-0 border-0" id="headingHistoria">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-gray-800 font-weight-bold p-4 text-decoration-none d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseHistoria" aria-expanded="false" aria-controls="collapseHistoria">
                                <span style="font-size: 1.1rem;"><i class="fas fa-book-open text-primary mr-3 fa-lg"></i> Nuestra Historia</span>
                                <i class="fas fa-plus text-primary icon-toggle"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseHistoria" class="collapse" aria-labelledby="headingHistoria" data-parent="#accordionConfig">
                        <div class="card-body text-gray-700 bg-light p-4" style="font-size: 1.05rem; line-height: 1.6;">
                            {{ $config->historia ?? 'Información no registrada.' }}
                        </div>
                    </div>
                </div>

                {{-- Contacto --}}
                <div class="card border-bottom">
                    <div class="card-header bg-white p-0 border-0" id="headingContacto">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left text-gray-800 font-weight-bold p-4 text-decoration-none d-flex justify-content-between align-items-center collapsed" type="button" data-toggle="collapse" data-target="#collapseContacto" aria-expanded="false" aria-controls="collapseContacto">
                                <span style="font-size: 1.1rem;"><i class="fas fa-map-marker-alt text-primary mr-3 fa-lg"></i> Información de Contacto</span>
                                <i class="fas fa-plus text-primary icon-toggle"></i>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseContacto" class="collapse" aria-labelledby="headingContacto" data-parent="#accordionConfig">
                        <div class="card-body text-gray-700 bg-light p-4" style="font-size: 1.05rem; line-height: 1.6;">
                            <p class="mb-2"><i class="fas fa-phone mr-2 text-primary"></i> <strong>Teléfono:</strong> {{ $config->telefono_contacto ?? 'No registrado.' }}</p>
                            <p class="mb-0"><i class="fas fa-map mr-2 text-primary"></i> <strong>Dirección:</strong> {{ $config->direccion_fisica ?? 'No registrada.' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Servicios / Precios Removidos por petición del usuario --}}

            </div>
        </div>
    </div>

    {{-- Script para cambiar el ícono de + a - al expandir --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#accordionConfig').on('show.bs.collapse', function (e) {
                $(e.target).prev('.card-header').find('.icon-toggle').removeClass('fa-plus').addClass('fa-minus');
            }).on('hide.bs.collapse', function (e) {
                $(e.target).prev('.card-header').find('.icon-toggle').removeClass('fa-minus').addClass('fa-plus');
            });
            // Asegurarnos que el que inicia abierto tenga el ícono correcto
            $('#accordionConfig .collapse.show').prev('.card-header').find('.icon-toggle').removeClass('fa-plus').addClass('fa-minus');
        });
    </script>

@endsection
