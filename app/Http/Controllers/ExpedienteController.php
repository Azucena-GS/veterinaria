<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Consulta;

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

    public function showConsulta(Mascota $mascota, Consulta $consulta)
    {
        // Validar que la consulta pertenezca a la mascota
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }
        
        $consulta->load(['veterinario.user']);
        $mascota->load(['dueno']);

        return view('modules.expedientes.consulta_show', compact('mascota', 'consulta'));
    }

    public function diagnostico(Mascota $mascota, Consulta $consulta)
    {
        // Validar que la consulta pertenezca a la mascota
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }
        
        $consulta->load(['veterinario.user']);
        $mascota->load(['dueno']);

        return view('modules.expedientes.diagnostico', compact('mascota', 'consulta'));
    }

    public function updateDiagnostico(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }

        $request->validate([
            'diagnostico' => 'required|string',
        ]);

        $esNuevo = empty($consulta->diagnostico);

        $consulta->diagnostico = $request->input('diagnostico');
        $consulta->save();

        $mensaje = $esNuevo ? 'Se guardó la nueva información exitosamente.' : 'Se actualizó con éxito el diagnóstico.';

        return redirect()->route('expedientes.consultas.diagnostico', [$mascota->id, $consulta->id])
                         ->with('success', $mensaje);
    }
}
