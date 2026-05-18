<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->rol === 'administrador';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $usuarioId = $this->route('usuario')->id ?? $this->route('usuario');

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $usuarioId,
            'password' => 'nullable|string|min:8',
            'rol' => 'required|in:administrador,veterinario',
        ];

        if ($this->input('rol') === 'veterinario') {
            $rules['foto_firma'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser texto válido.',
            'max' => 'El campo :attribute no debe superar los :max caracteres.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'email' => 'El :attribute debe ser un correo electrónico válido.',
            'unique' => 'Este :attribute ya está en uso.',
            'in' => 'El :attribute seleccionado no es válido.',
            'image' => 'El archivo subido para :attribute debe ser una imagen.',
            'mimes' => 'El archivo de :attribute debe ser de tipo: :values.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'password' => 'contraseña',
            'rol' => 'rol de usuario',
            'foto_firma' => 'foto o firma',
        ];
    }
}
