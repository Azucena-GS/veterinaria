@extends('layouts.admin')

@section('titulo_pagina', 'Gestión de Usuarios')
@section('titulo_seccion', 'Usuarios')

@section('acciones_cabecera')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo Usuario
    </a>
@endsection

@section('contenido')

    <div class="row">
        <div class="col-12">
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
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        <i class="fas fa-info-circle mr-1"></i> Aquí se mostrará la lista de usuarios.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
