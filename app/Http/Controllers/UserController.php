<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Veterinario;

class UserController extends Controller
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

    public function index()
    {
        $this->soloAdmin();
        $usuarios = User::with('veterinario')->paginate(5);
        return view('modules.admin.usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        $this->soloAdmin();
        return view('modules.admin.usuarios.create');
    }

    public function store(StoreUserRequest $request)
    {
        $this->soloAdmin();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        if ($request->rol === 'veterinario') {

            $fotoPath = null;
            if ($request->hasFile('foto_firma')) {
                $fotoPath = $request->file('foto_firma')->store('firmas_veterinarios', 'public');
            }

            Veterinario::create([
                'usuario_id' => $user->id,
                'nombre_completo' => $request->name,
                'especialidad' => $request->especialidad,
                'cedula_profesional' => $request->cedula_profesional,
                'foto_firma' => $fotoPath,
            ]);
        }

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function edit(User $usuario)
    {
        $this->soloAdmin();
        $usuario->load('veterinario');
        return view('modules.admin.usuarios.edit', compact('usuario'));
    }

    public function update(UpdateUserRequest $request, User $usuario)
    {
        $this->soloAdmin();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        if ($request->rol === 'veterinario') {
            $veterinarioData = [
                'nombre_completo' => $request->name,
                'especialidad' => $request->especialidad,
                'cedula_profesional' => $request->cedula_profesional,
            ];

            if ($request->hasFile('foto_firma')) {
                $veterinarioData['foto_firma'] = $request->file('foto_firma')->store('firmas_veterinarios', 'public');
            }

            $usuario->veterinario()->updateOrCreate(
                ['usuario_id' => $usuario->id],
                $veterinarioData
            );
        } else {
            if ($usuario->veterinario) {
                $usuario->veterinario()->delete();
            }
        }

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function show(User $usuario)
    {
        $this->soloAdmin();
        $usuario->load('veterinario');
        $hasDependencies = $usuario->hasDependencies();
        
        return view('modules.admin.usuarios.show', compact('usuario', 'hasDependencies'));
    }

    public function destroy(User $usuario)
    {
        $this->soloAdmin();

        if ($usuario->hasDependencies()) {
            return redirect()->route('admin.usuarios.show', $usuario)
                ->with('error', 'No se puede eliminar el usuario porque tiene registros dependientes en el sistema.');
        }

        // Eliminar veterinario asociado si existe
        if ($usuario->veterinario) {
            $usuario->veterinario()->delete();
        }

        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
