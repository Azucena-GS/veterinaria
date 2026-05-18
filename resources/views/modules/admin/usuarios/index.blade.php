@extends('layouts.admin')

@section('titulo_pagina', 'Gestión de Usuarios')
@section('titulo_seccion', 'Usuarios')

@section('acciones_cabecera')
    <a href="{{ route('admin.usuarios.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Usuario
    </a>
@endsection

@section('contenido')

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">
                        <i class="fas fa-users-cog mr-2"></i>Lista de Usuarios
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTableUsuarios" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Especialidad</th>
                                    <th>Cédula</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($usuarios as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->rol === 'administrador')
                                                <span class="badge badge-primary">Administrador</span>
                                            @else
                                                <span class="badge badge-success">Veterinario</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->rol === 'veterinario' && $user->veterinario)
                                                {{ $user->veterinario->especialidad }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->rol === 'veterinario' && $user->veterinario)
                                                {{ $user->veterinario->cedula_profesional }}
                                            @else
                                                <span class="text-muted">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.usuarios.edit', $user) }}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.usuarios.show', $user) }}" class="btn btn-sm btn-danger" title="Ver / Eliminar"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            <i class="fas fa-info-circle mr-1"></i> No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $usuarios->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
