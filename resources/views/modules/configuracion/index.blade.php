@extends('layouts.admin')

@section('titulo_pagina', 'Configuración del Sistema')
@section('titulo_seccion', 'Información de la Clínica')

@section('contenido')
    <div class="row">
        <div class="col-xl-8 col-lg-10 mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajustes Generales</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.configuracion.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <h5 class="font-weight-bold text-gray-800 mb-3"><i class="fas fa-info-circle mr-2"></i>Información Básica</h5>
                        <hr>
                        
                        <div class="form-group mb-3">
                            <label class="font-weight-bold" for="nombre_clinica">Nombre de la Clínica</label>
                            <input type="text" class="form-control @error('nombre_clinica') is-invalid @enderror" id="nombre_clinica" name="nombre_clinica" value="{{ old('nombre_clinica', $config->nombre_clinica) }}" placeholder="Ej. Veterinaria San Roque">
                            @error('nombre_clinica')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="telefono_contacto">Teléfono de Contacto</label>
                                <input type="text" class="form-control @error('telefono_contacto') is-invalid @enderror" id="telefono_contacto" name="telefono_contacto" value="{{ old('telefono_contacto', $config->telefono_contacto) }}">
                                @error('telefono_contacto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="logo">Logo del Sistema (Opcional)</label>
                                <input type="file" class="form-control-file @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*">
                                @if($config->logo_path)
                                    <small class="text-muted mt-2 d-block">
                                        <i class="fas fa-image mr-1"></i> Ya existe un logo guardado. Subir uno nuevo lo reemplazará.
                                    </small>
                                @endif
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold" for="direccion_fisica">Dirección Física</label>
                            <textarea class="form-control @error('direccion_fisica') is-invalid @enderror" id="direccion_fisica" name="direccion_fisica" rows="2">{{ old('direccion_fisica', $config->direccion_fisica) }}</textarea>
                            @error('direccion_fisica')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <h5 class="font-weight-bold text-gray-800 mb-3 mt-5"><i class="fas fa-book mr-2"></i>Identidad Corporativa</h5>
                        <hr>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="mision">Misión</label>
                                <textarea class="form-control @error('mision') is-invalid @enderror" id="mision" name="mision" rows="4">{{ old('mision', $config->mision) }}</textarea>
                                @error('mision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="vision">Visión</label>
                                <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="4">{{ old('vision', $config->vision) }}</textarea>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold" for="valores">Valores Institucionales</label>
                            <textarea class="form-control @error('valores') is-invalid @enderror" id="valores" name="valores" rows="3">{{ old('valores', $config->valores) }}</textarea>
                            @error('valores')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold" for="historia">Historia de la Clínica</label>
                            <textarea class="form-control @error('historia') is-invalid @enderror" id="historia" name="historia" rows="4">{{ old('historia', $config->historia) }}</textarea>
                            @error('historia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <hr class="mt-5 mb-4">
                        
                        <div class="text-right">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-save mr-2"></i> Guardar Configuración
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
