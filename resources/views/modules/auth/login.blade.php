@extends('layouts.auth')

@section('titulo_pagina', 'Iniciar Sesión')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">

                        {{-- Panel izquierdo con logo --}}
                        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center"
                             style="background: linear-gradient(135deg, #f48fb1 0%, #ec407a 100%); min-height: 400px;">
                            <img src="{{ asset('img/logo1.png') }}"
                                 alt="Logo Veterinaria"
                                 class="img-fluid"
                                 style="max-width: 75%; filter: drop-shadow(0 4px 16px rgba(0,0,0,0.25));">
                        </div>

                        {{-- Formulario de login --}}
                        <div class="col-lg-6">
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">
                                        <i class="fas fa-paw text-primary mr-2"></i>
                                        Bienvenido al Sistema
                                    </h1>
                                </div>

                                {{-- Mensaje de error --}}
                                @if(session('error') || $errors->any())
                                    <div class="alert alert-danger">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        Credenciales incorrectas. Intenta de nuevo.
                                    </div>
                                @endif

                                <form class="user" action="{{ route('logear') }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="email"
                                            name="email"
                                            placeholder="Correo electrónico..."
                                            value="{{ old('email') }}"
                                            required
                                            autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user"
                                            id="password"
                                            name="password"
                                            placeholder="Contraseña"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                                    </button>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
