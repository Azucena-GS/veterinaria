<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $config = \App\Models\ConfiguracionSistema::first() ?? new \App\Models\ConfiguracionSistema();
        return view('modules.configuracion.index', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nombre_clinica' => 'nullable|string|max:255',
            'mision' => 'nullable|string',
            'vision' => 'nullable|string',
            'valores' => 'nullable|string',
            'historia' => 'nullable|string',
            'precios_servicios' => 'nullable|string', // Will be parsed as JSON
            'direccion_fisica' => 'nullable|string',
            'telefono_contacto' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $config = \App\Models\ConfiguracionSistema::first() ?? new \App\Models\ConfiguracionSistema();
        
        $config->nombre_clinica = $request->nombre_clinica;
        $config->mision = $request->mision;
        $config->vision = $request->vision;
        $config->valores = $request->valores;
        $config->historia = $request->historia;
        
        if ($request->filled('precios_servicios')) {
            // Validar que sea un JSON válido si no está vacío
            json_decode($request->precios_servicios);
            if (json_last_error() === JSON_ERROR_NONE) {
                $config->precios_servicios = json_decode($request->precios_servicios, true);
            }
        } else {
            $config->precios_servicios = null;
        }

        $config->direccion_fisica = $request->direccion_fisica;
        $config->telefono_contacto = $request->telefono_contacto;

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($config->logo_path && file_exists(public_path('uploads/config/' . $config->logo_path))) {
                unlink(public_path('uploads/config/' . $config->logo_path));
            }
            
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Ensure directory exists
            if (!file_exists(public_path('uploads/config'))) {
                mkdir(public_path('uploads/config'), 0777, true);
            }
            $file->move(public_path('uploads/config'), $filename);
            $config->logo_path = $filename;
        }

        $config->save();

        return redirect()->route('admin.configuracion.index')->with('success', 'Configuración actualizada exitosamente.');
    }
}
