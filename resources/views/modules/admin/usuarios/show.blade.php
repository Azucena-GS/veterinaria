@extends('layouts.admin')

@section('titulo_pagina', 'Detalles del Usuario')
@section('titulo_seccion', 'Detalles y Eliminación de Usuario')

@section('acciones_cabecera')
    <a href="{{ route('admin.usuarios.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-arrow-left fa-sm text-white-50"></i> Volver a la Lista
    </a>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark"><i class="fas fa-info-circle mr-2"></i>Información del Usuario</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>ID:</strong> {{ $usuario->id }}</li>
                        <li class="list-group-item"><strong>Nombre:</strong> {{ $usuario->name }}</li>
                        <li class="list-group-item"><strong>Correo Electrónico:</strong> {{ $usuario->email }}</li>
                        <li class="list-group-item"><strong>Rol:</strong> 
                            @if($usuario->rol === 'administrador')
                                <span class="badge badge-primary">Administrador</span>
                            @else
                                <span class="badge badge-success">Veterinario</span>
                            @endif
                        </li>
                        <li class="list-group-item"><strong>Fecha de Registro:</strong> {{ $usuario->created_at->format('d/m/Y H:i') }}</li>
                    </ul>

                    @if($usuario->rol === 'veterinario' && $usuario->veterinario)
                        <h6 class="mt-4 font-weight-bold text-dark border-bottom pb-2">Datos de Veterinario</h6>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow mb-4 border-left-danger">
                <div class="card-header py-3 text-danger">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-exclamation-triangle mr-2"></i>Zona de Peligro</h6>
                </div>
                <div class="card-body">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <p>Estás a punto de eliminar a este usuario del sistema. Esta acción <strong>no se puede deshacer</strong> y eliminará permanentemente sus datos de acceso.</p>
                    
                    @if($usuario->rol === 'veterinario')
                        <p class="text-warning"><i class="fas fa-info-circle mr-1"></i> También se eliminará su perfil de veterinario asociado.</p>
                    @endif

                    @if($hasDependencies)
                        <div class="alert alert-warning">
                            <i class="fas fa-ban mr-2"></i> <strong>No puedes eliminar a este usuario.</strong>
                            <br>
                            El usuario tiene registros asociados en el sistema (por ejemplo, consultas, historiales, etc). Debes reasignar o eliminar esos registros primero.
                        </div>
                        <button class="btn btn-danger btn-block" disabled>
                            <i class="fas fa-trash-alt mr-2"></i> Eliminar Usuario
                        </button>
                    @elseif(Auth::id() === $usuario->id)
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle mr-2"></i> No puedes eliminar tu propia cuenta mientras estés en sesión.
                        </div>
                        <button class="btn btn-danger btn-block" disabled>
                            <i class="fas fa-trash-alt mr-2"></i> Eliminar Usuario
                        </button>
                    @else
                        <form action="{{ route('admin.usuarios.destroy', $usuario) }}" method="POST" onsubmit="return confirm('¿Estás absolutamente seguro de que deseas eliminar este usuario? Esta acción es irreversible.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">
                                <i class="fas fa-trash-alt mr-2"></i> Eliminar Usuario Permanentemente
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
