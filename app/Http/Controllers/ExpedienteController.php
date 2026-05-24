<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class ExpedienteController extends Controller
{
    public function buscar(Request $request)
    {
        $query = $request->input('q');

        if (empty($query)) {
            return response()->json([]);
        }

        // Usamos Eloquent en lugar del driver 'database' de Scout para poder
        // buscar dentro de las relaciones (nombre_completo del dueño) sin errores SQL.
        $resultados = Mascota::with('dueno')
            ->where('id', 'like', "%{$query}%")
            ->orWhere('nombre', 'like', "%{$query}%")
            ->orWhereHas('dueno', function ($q) use ($query) {
                $q->where('nombre_completo', 'like', "%{$query}%");
            })
            ->take(5)
            ->get();

        return response()->json($resultados);
    }
    public function consultas(Mascota $mascota)
    {
        $mascota->load(['consultas.veterinario.user', 'dueno']);
        return view('modules.expedientes.consultas', compact('mascota'));
    }
}
