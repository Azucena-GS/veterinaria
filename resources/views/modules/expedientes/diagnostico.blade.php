@extends('layouts.app')

@section('titulo_pagina', 'Diagnóstico')
@section('titulo_seccion', 'Diagnóstico de la Consulta')

@section('acciones_cabecera')
    <a href="{{ route('expedientes.consultas.show', [$mascota->id, $consulta->id]) }}" class="btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Volver
    </a>
@endsection

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
            <span class="text-gray-600">Diagnóstico</span>
        </div>
    </div>

    <!-- Encabezado Mascota y Fecha -->
    <div class="card shadow mb-4 border-left-primary">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <div class="mr-4">
                    <i class="fas fa-paw fa-3x text-primary"></i>
                </div>
                <div>
                    <h4 class="font-weight-bold text-dark mb-1">{{ $mascota->nombre }}</h4>
                    <span class="text-muted small">
                        Folio #{{ $mascota->id }} &bull; Consulta del {{ $consulta->fecha_consulta->format('d/m/Y h:i A') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Diagnóstico -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-white border-bottom-0">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-clipboard-list mr-2"></i>Redactar Diagnóstico</h6>
        </div>
        <div class="card-body pt-0">
            @if(empty($consulta->diagnostico))
                <div class="alert alert-warning mb-4 py-2">
                    <i class="fas fa-exclamation-triangle mr-2"></i> Aún sin diagnóstico.
                </div>
            @endif

            <form action="{{ route('expedientes.consultas.diagnostico.update', [$mascota->id, $consulta->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <textarea id="diagnostico" name="diagnostico">{{ old('diagnostico', $consulta->diagnostico) }}</textarea>
                </div>
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary px-4 shadow-sm">
                        <i class="fas fa-save mr-2"></i> Guardar Diagnóstico
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
<style>
    /* Ajuste de altura para CKEditor */
    .ck-editor__editable_inline {
        min-height: 300px;
    }
</style>
@endpush

@push('scripts')
<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        ClassicEditor
            .create( document.querySelector( '#diagnostico' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|', 'undo', 'redo' ]
            } )
            .catch( error => {
                console.error( error );
            } );
    });
</script>
@endpush
