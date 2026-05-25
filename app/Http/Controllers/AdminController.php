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

        $config = \App\Models\ConfiguracionSistema::first();
        
        $stats = [
            'usuarios' => \App\Models\User::count(),
            'veterinarios' => \App\Models\User::where('rol', 'veterinario')->count(),
            'consultas' => \App\Models\Consulta::count(),
            'pacientes' => \App\Models\Mascota::count(),
        ];

        $recentUsers = \App\Models\User::latest()->take(5)->get();

        return view('modules.admin.dashboard.home', compact('config', 'stats', 'recentUsers'));
    }
}
