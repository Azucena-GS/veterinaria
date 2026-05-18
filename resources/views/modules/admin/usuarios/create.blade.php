@extends('layouts.admin')

@section('titulo_pagina', 'Nuevo Usuario')
@section('titulo_seccion', 'Crear Usuario')

@section('acciones_cabecera')
    <a href="{{ route('admin.usuarios.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver a la Lista
    </a>
@endsection

@section('contenido')

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Formulario de Registro</h6>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.usuarios.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h5 class="text-dark font-weight-bold mb-3 border-bottom pb-2">Datos de Acceso</h5>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="name">Nombre Completo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="password">Contraseña <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="rol">Rol de Usuario <span class="text-danger">*</span></label>
                                <select class="form-control" id="rol" name="rol" required>
                                    <option value="" disabled selected>Seleccione un rol...</option>
                                    <option value="administrador" {{ old('rol') == 'administrador' ? 'selected' : '' }}>Administrador</option>
                                    <option value="veterinario" {{ old('rol') == 'veterinario' ? 'selected' : '' }}>Veterinario</option>
                                </select>
                            </div>
                        </div>

                        {{-- Sección de Veterinario (Oculta por defecto) --}}
                        <div id="veterinario_section" style="display: none;">
                            <h5 class="text-dark font-weight-bold mt-4 mb-3 border-bottom pb-2">Datos del Veterinario</h5>
                            
                            

                            <div class="form-group">
                                <label for="foto_firma">Foto o Firma (Opcional)</label>
                                <input type="file" class="form-control-file" id="foto_firma" name="foto_firma" accept="image/*">
                                <small class="form-text text-muted">Archivos permitidos: JPG, PNG, GIF. Max 2MB.</small>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-dark btn-block">
                            <i class="fas fa-save mr-2"></i> Registrar Usuario
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script src="{{ asset('js/admin/usuarios/create.js') }}"></script>
@endsection
