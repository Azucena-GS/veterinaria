@extends('layouts.app')

@section('ocultar_sidebar', true)

@section('titulo_pagina', 'Nuevo Expediente')
@section('titulo_seccion', 'Registrar Nuevo Paciente')

@section('contenido')
    <form action="{{ route('expedientes.store') }}" method="POST">
        @csrf
        
        <div class="row">
            <!-- Sección: Datos del Dueño -->
            <div class="col-lg-5 mb-4">
                <div class="card shadow h-100 border-left-primary">
                    <div class="card-header py-3 bg-white d-flex align-items-center">
                        <i class="fas fa-user-circle fa-2x text-primary mr-3"></i>
                        <h6 class="m-0 font-weight-bold text-primary">Datos del Dueño</h6>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info py-2 small">
                            <i class="fas fa-info-circle mr-1"></i> Si el dueño ya existe en el sistema, escribe su nombre exacto y se vinculará automáticamente.
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold" for="nombre_dueno">Nombre Completo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nombre_dueno') is-invalid @enderror" id="nombre_dueno" name="nombre_dueno" value="{{ old('nombre_dueno') }}" required>
                            @error('nombre_dueno')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold" for="telefono">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <label class="font-weight-bold" for="direccion">Dirección</label>
                            <textarea class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" rows="3">{{ old('direccion') }}</textarea>
                            @error('direccion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sección: Datos de la Mascota -->
            <div class="col-lg-7 mb-4">
                <div class="card shadow h-100 border-left-success">
                    <div class="card-header py-3 bg-white d-flex align-items-center">
                        <i class="fas fa-paw fa-2x text-success mr-3"></i>
                        <h6 class="m-0 font-weight-bold text-success">Datos de la Mascota (Paciente)</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="nombre_mascota">Nombre de la Mascota <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nombre_mascota') is-invalid @enderror" id="nombre_mascota" name="nombre_mascota" value="{{ old('nombre_mascota') }}" required>
                                @error('nombre_mascota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="especie">Especie <span class="text-danger">*</span></label>
                                <select class="form-control @error('especie') is-invalid @enderror" id="especie" name="especie" required>
                                    <option value="" disabled selected>-- Selecciona Especie --</option>
                                    <option value="Perro" {{ old('especie') == 'Perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="Gato" {{ old('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="Ave" {{ old('especie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                                    <option value="Roedor" {{ old('especie') == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                                    <option value="Reptil" {{ old('especie') == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                                    <option value="Otro" {{ old('especie') == 'Otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('especie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group mb-3 d-none" id="div_otra_especie">
                                <label class="font-weight-bold" for="otra_especie">Especifique otra especie <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('otra_especie') is-invalid @enderror" id="otra_especie" name="otra_especie" value="{{ old('otra_especie') }}">
                                @error('otra_especie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="raza">Raza</label>
                                <input type="text" class="form-control @error('raza') is-invalid @enderror" id="raza" name="raza" value="{{ old('raza') }}">
                                @error('raza')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                                @error('fecha_nacimiento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="tipo_sangre">Tipo de Sangre</label>
                                <input type="text" class="form-control @error('tipo_sangre') is-invalid @enderror" id="tipo_sangre" name="tipo_sangre" value="{{ old('tipo_sangre') }}">
                                @error('tipo_sangre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group mb-3">
                                <label class="font-weight-bold" for="comportamiento">Comportamiento</label>
                                <input type="text" class="form-control @error('comportamiento') is-invalid @enderror" id="comportamiento" name="comportamiento" value="{{ old('comportamiento') }}">
                                @error('comportamiento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 mt-2">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="es_adoptado" name="es_adoptado" value="1" {{ old('es_adoptado') ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold" for="es_adoptado">¿Es adoptado?</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-5">
            <a href="{{ route('expedientes') }}" class="btn btn-secondary px-4 mr-2">
                <i class="fas fa-times mr-1"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save mr-1"></i> Guardar Nuevo Expediente
            </button>
        </div>
    </form>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const especieSelect = document.getElementById('especie');
    const divOtraEspecie = document.getElementById('div_otra_especie');
    const inputOtraEspecie = document.getElementById('otra_especie');

    function toggleOtraEspecie() {
        if (especieSelect.value === 'Otro') {
            divOtraEspecie.classList.remove('d-none');
            inputOtraEspecie.setAttribute('required', 'required');
        } else {
            divOtraEspecie.classList.add('d-none');
            inputOtraEspecie.removeAttribute('required');
            inputOtraEspecie.value = ''; // clear it if they change their mind
        }
    }

    especieSelect.addEventListener('change', toggleOtraEspecie);
    
    // Check initial state (in case of validation failure redirect back)
    toggleOtraEspecie();
});
</script>
@endpush
