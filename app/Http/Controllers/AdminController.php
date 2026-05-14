<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Verifica que el usuario autenticado sea administrador.
     */
    private function soloAdmin(): void
    {
        if (Auth::user()->rol !== 'administrador') {
            abort(403, 'Acceso no autorizado.');
        }
    }

    /**
     * Dashboard principal del administrador.
     */
    public function home()
    {
        $this->soloAdmin();
        return view('modules.admin.dashboard.home');
    }
}
