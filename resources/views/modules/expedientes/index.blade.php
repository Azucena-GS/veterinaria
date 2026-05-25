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
                </div>
                <div class="card-body">
                    <div class="row justify-content-center py-5">
                        <div class="col-md-8 text-center">
                            
                            <h4 class="mb-4 text-gray-800">Buscar Expediente</h4>
                            
                            {{-- Buscador --}}
                            <div class="position-relative text-left">
                                <div class="input-group input-group-lg mb-4 shadow-sm">
                                    <input type="text" id="inputBuscador" class="form-control" placeholder="Buscar por nombre de mascota, dueño o folio..." autocomplete="off">
                                    <input type="hidden" id="mascotaSeleccionadaId" value="">                                </div>
                                
                                {{-- Contenedor de Resultados Flotante --}}
                                <div id="resultadosBusqueda" class="dropdown-menu w-100 shadow position-absolute" style="top: 100%; left: 0; display: none; max-height: 300px; overflow-y: auto; z-index: 1000; margin-top: 0.1rem;">
                                    <!-- Los resultados se inyectarán aquí con JS -->
                                </div>
                            </div>
                            
                            {{-- Botones de acción --}}
                            <div class="d-flex justify-content-center mt-4">
                                <button type="button" id="btnVerConsultas" class="btn btn-lg btn-outline-primary mx-2 shadow-sm">
                                    <i class="fas fa-file-medical-alt mr-2"></i>Ver Consultas
                                </button>
                                <a href="{{ route('expedientes.crear') }}" class="btn btn-lg btn-success mx-2 shadow-sm">
                                    <i class="fas fa-plus-circle mr-2"></i>Nuevo Paciente/Mascota
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('inputBuscador');
    const inputHiddenId = document.getElementById('mascotaSeleccionadaId');
    const btnVerConsultas = document.getElementById('btnVerConsultas');
    const resultadosContainer = document.getElementById('resultadosBusqueda');
    let timeoutId;

    input.addEventListener('input', function() {
        const query = this.value.trim();

        // Limpiar el timeout anterior (debounce)
        clearTimeout(timeoutId);

        if (query.length === 0) {
            resultadosContainer.style.display = 'none';
            resultadosContainer.innerHTML = '';
            return;
        }

        // Esperar 300ms antes de hacer la petición
        timeoutId = setTimeout(() => {
            fetch(`/expedientes/buscar?q=${encodeURIComponent(query)}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.json())
                .then(data => {
                    resultadosContainer.innerHTML = '';
                    
                    if (data.length === 0) {
                        resultadosContainer.innerHTML = '<div class="p-3 text-muted text-center">No se encontraron resultados.</div>';
                        resultadosContainer.style.display = 'block';
                        return;
                    }

                    data.forEach(mascota => {
                        const duenoNombre = mascota.dueno ? mascota.dueno.nombre_completo : 'Sin dueño';
                        const item = document.createElement('a');
                        item.href = '#'; // Cambiar esto por la ruta real al expediente cuando exista
                        item.className = 'dropdown-item d-flex flex-column align-items-start py-2 border-bottom';
                        item.innerHTML = `
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1 font-weight-bold text-primary"><i class="fas fa-paw mr-2"></i>${mascota.nombre}</h6>
                                <small class="text-muted">Folio: #${mascota.id}</small>
                            </div>
                            <small class="text-gray-800"><i class="fas fa-user mr-1 text-muted"></i> Dueño: ${duenoNombre}</small>
                        `;
                        
                        // Si hace clic, que ponga el nombre en el input y guarde el ID
                        item.addEventListener('click', function(e) {
                            e.preventDefault();
                            input.value = mascota.nombre;
                            inputHiddenId.value = mascota.id;
                            resultadosContainer.style.display = 'none';
                        });

                        resultadosContainer.appendChild(item);
                    });
                    
                    resultadosContainer.style.display = 'block';
                })
                .catch(error => console.error('Error al buscar:', error));
        }, 300);
    });

    // Redirigir a consultas al hacer clic en el botón
    btnVerConsultas.addEventListener('click', function() {
        const mascotaId = inputHiddenId.value;
        if (mascotaId) {
            window.location.href = `/expedientes/${mascotaId}/consultas`;
        } else {
            alert('Por favor, busca y selecciona un expediente primero.');
        }
    });

    // Cerrar resultados si se hace clic fuera
    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !resultadosContainer.contains(e.target)) {
            resultadosContainer.style.display = 'none';
        }
    });
});
</script>
@endpush
