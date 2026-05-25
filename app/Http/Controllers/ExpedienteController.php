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

    public function createConsulta(Mascota $mascota)
    {
        $mascota->load('dueno');
        $veterinarios = [];
        
        if (auth()->user()->rol === 'administrador') {
            $veterinarios = \App\Models\Veterinario::with('user')->get();
        }
        
        return view('modules.expedientes.crear_consulta', compact('mascota', 'veterinarios'));
    }

    public function storeConsulta(Request $request, Mascota $mascota)
    {
        $request->validate([
            'peso' => 'required|numeric|min:0',
            'talla' => 'required|numeric|min:0',
        ]);

        $veterinario_id = null;
        if (auth()->user()->rol === 'administrador') {
            $request->validate([
                'veterinario_id' => 'required|exists:veterinarios,id',
            ]);
            $veterinario_id = $request->veterinario_id;
        } else {
            $veterinario = auth()->user()->veterinario;
            if (!$veterinario) {
                return back()->withInput()->withErrors(['veterinario_id' => 'Tu cuenta no tiene un perfil de veterinario asociado. Contacta al administrador para que complete tu registro.']);
            }
            $veterinario_id = $veterinario->id;
        }

        $mascota->consultas()->create([
            'veterinario_id' => $veterinario_id,
            'peso' => $request->peso,
            'talla' => $request->talla,
            'fecha_consulta' => now(),
        ]);

        return redirect()->route('expedientes.consultas', $mascota->id)
                         ->with('success', 'Consulta registrada exitosamente.');
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

    public function tratamiento(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }
        
        $consulta->load(['veterinario.user']);
        $mascota->load(['dueno']);

        return view('modules.expedientes.tratamiento', compact('mascota', 'consulta'));
    }

    public function updateTratamiento(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }

        $request->validate([
            'tratamiento' => 'required|string',
        ]);

        $esNuevo = empty($consulta->tratamiento);

        $consulta->tratamiento = $request->input('tratamiento');
        $consulta->save();

        $mensaje = $esNuevo ? 'Se guardó el tratamiento exitosamente.' : 'Se actualizó con éxito el tratamiento.';

        return redirect()->route('expedientes.consultas.tratamiento', [$mascota->id, $consulta->id])
                         ->with('success', $mensaje);
    }

    public function imprimirReceta(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) {
            abort(404);
        }
        
        $consulta->load(['veterinario.user']);
        $mascota->load(['dueno']);

        return view('modules.expedientes.receta_print', compact('mascota', 'consulta'));
    }
}
