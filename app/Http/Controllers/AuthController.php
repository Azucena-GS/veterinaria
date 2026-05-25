<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index(){
        return view("modules/auth/login");
    }

    public function logear(Request $request) {
        $creadenciales = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($creadenciales)) {
            $rol = Auth::user()->rol;

            if ($rol === 'administrador') {
                return to_route('admin.home');
            }

            return to_route('home');
        }

        return to_route('login');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function home() {
        if (Auth::user()->rol === 'administrador') {
            return to_route('admin.home');
        }

        $config = \App\Models\ConfiguracionSistema::first();
        
        $stats = [
            'pacientes' => \App\Models\Mascota::count(),
            'consultas' => \App\Models\Consulta::count(),
            'propietarios' => \App\Models\Dueno::count(),
            'veterinarios' => \App\Models\User::where('rol', 'veterinario')->count()
        ];

        $recentConsultas = \App\Models\Consulta::with(['mascota', 'veterinario.user'])
            ->latest('fecha_consulta')
            ->take(5)
            ->get();

        return view('modules/dashboard/home', compact('config', 'stats', 'recentConsultas'));
    }
}
