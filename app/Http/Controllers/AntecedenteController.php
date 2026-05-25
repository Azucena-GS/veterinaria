<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Consulta;
use App\Models\AntecedenteAlergia;
use App\Models\AntecedenteLesion;
use App\Models\AntecedentePatologico;
use App\Models\HistorialAlimentacion;

class AntecedenteController extends Controller
{
    // ==========================================
    // ALERGIAS
    // ==========================================
    public function historialAlergias(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        $mascota->load('alergias');
        return view('modules.expedientes.historial_alergias', compact('mascota', 'consulta'));
    }

    public function crearAlergia(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        return view('modules.expedientes.alergias', compact('mascota', 'consulta'));
    }

    public function storeAlergia(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);

        $request->validate([
            'sustancia_alergena' => 'required|string|max:255',
            'reaccion' => 'required|string',
        ]);

        $mascota->alergias()->create($request->all());

        return redirect()->route('expedientes.consultas.alergias', [$mascota->id, $consulta->id])
                         ->with('success', 'Alergia registrada exitosamente.');
    }

    public function deleteAlergia(Mascota $mascota, Consulta $consulta, AntecedenteAlergia $alergia)
    {
        if ($alergia->mascota_id !== $mascota->id) abort(404);
        return view('modules.expedientes.delete_alergia', compact('mascota', 'consulta', 'alergia'));
    }

    public function destroyAlergia(Mascota $mascota, Consulta $consulta, AntecedenteAlergia $alergia)
    {
        if ($alergia->mascota_id !== $mascota->id) abort(404);
        $alergia->delete();
        return redirect()->route('expedientes.consultas.alergias', [$mascota->id, $consulta->id])
                         ->with('success', 'Alergia eliminada exitosamente.');
    }

    // ==========================================
    // LESIONES
    // ==========================================
    public function historialLesiones(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        $mascota->load('lesiones');
        return view('modules.expedientes.historial_lesiones', compact('mascota', 'consulta'));
    }

    public function crearLesion(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        return view('modules.expedientes.lesiones', compact('mascota', 'consulta'));
    }

    public function storeLesion(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);

        $request->validate([
            'tipo_lesion' => 'required|string|max:255',
        ]);

        $mascota->lesiones()->create($request->all());

        return redirect()->route('expedientes.consultas.lesiones', [$mascota->id, $consulta->id])
                         ->with('success', 'Lesión registrada exitosamente.');
    }

    public function deleteLesion(Mascota $mascota, Consulta $consulta, AntecedenteLesion $lesion)
    {
        if ($lesion->mascota_id !== $mascota->id) abort(404);
        return view('modules.expedientes.delete_lesion', compact('mascota', 'consulta', 'lesion'));
    }

    public function destroyLesion(Mascota $mascota, Consulta $consulta, AntecedenteLesion $lesion)
    {
        if ($lesion->mascota_id !== $mascota->id) abort(404);
        $lesion->delete();
        return redirect()->route('expedientes.consultas.lesiones', [$mascota->id, $consulta->id])
                         ->with('success', 'Lesión eliminada exitosamente.');
    }

    // ==========================================
    // PATOLÓGICOS
    // ==========================================
    public function historialPatologicos(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        $mascota->load('patologicos');
        return view('modules.expedientes.historial_patologicos', compact('mascota', 'consulta'));
    }

    public function crearPatologico(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        return view('modules.expedientes.patologicos', compact('mascota', 'consulta'));
    }

    public function storePatologico(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);

        $request->validate([
            'enfermedad' => 'required|string|max:255',
            'es_cronica' => 'boolean',
        ]);

        $mascota->patologicos()->create([
            'enfermedad' => $request->enfermedad,
            'es_cronica' => $request->has('es_cronica'),
        ]);

        return redirect()->route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id])
                         ->with('success', 'Antecedente patológico registrado exitosamente.');
    }

    public function deletePatologico(Mascota $mascota, Consulta $consulta, AntecedentePatologico $patologico)
    {
        if ($patologico->mascota_id !== $mascota->id) abort(404);
        return view('modules.expedientes.delete_patologico', compact('mascota', 'consulta', 'patologico'));
    }

    public function destroyPatologico(Mascota $mascota, Consulta $consulta, AntecedentePatologico $patologico)
    {
        if ($patologico->mascota_id !== $mascota->id) abort(404);
        $patologico->delete();
        return redirect()->route('expedientes.consultas.patologicos', [$mascota->id, $consulta->id])
                         ->with('success', 'Antecedente patológico eliminado exitosamente.');
    }

    // ==========================================
    // ALIMENTACIÓN
    // ==========================================
    public function historialAlimentacion(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        $mascota->load('historial_alimentacion');
        return view('modules.expedientes.historial_alimentacion', compact('mascota', 'consulta'));
    }

    public function crearAlimentacion(Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);
        
        return view('modules.expedientes.alimentacion', compact('mascota', 'consulta'));
    }

    public function storeAlimentacion(Request $request, Mascota $mascota, Consulta $consulta)
    {
        if ($consulta->mascota_id !== $mascota->id) abort(404);

        $request->validate([
            'descripcion_dieta' => 'required|string',
            'frecuencia_diaria' => 'required|integer|min:1',
        ]);

        $mascota->historial_alimentacion()->create($request->all());

        return redirect()->route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id])
                         ->with('success', 'Dieta registrada exitosamente.');
    }

    public function deleteAlimentacion(Mascota $mascota, Consulta $consulta, HistorialAlimentacion $alimentacion)
    {
        if ($alimentacion->mascota_id !== $mascota->id) abort(404);
        return view('modules.expedientes.delete_alimentacion', compact('mascota', 'consulta', 'alimentacion'));
    }

    public function destroyAlimentacion(Mascota $mascota, Consulta $consulta, HistorialAlimentacion $alimentacion)
    {
        if ($alimentacion->mascota_id !== $mascota->id) abort(404);
        $alimentacion->delete();
        return redirect()->route('expedientes.consultas.alimentacion', [$mascota->id, $consulta->id])
                         ->with('success', 'Dieta eliminada exitosamente.');
    }
}
