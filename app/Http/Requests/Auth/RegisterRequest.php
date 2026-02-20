<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'codigo_id'        => ['required', 'string', 'exists:codigos,name'],
            'nombres'          => ['required', 'string', 'max:60'],
            'apellidos'        => ['required', 'string', 'max:60'],
            'numero_documento' => ['required', 'string', 'max:13', 'unique:users,numero_documento'],
            'telefono'         => ['required', 'string', 'max:20'],
            'email'            => ['required', 'email', 'max:255', 'unique:users'],
            'direccion'        => ['required', 'string', 'max:255'],
            'pais_id'          => ['required', 'integer', 'exists:countries,id'],
            'company_id'       => ['required', 'integer', 'exists:companies,id'],
            'branch_id'        => ['required', 'integer', 'exists:branches,id'],
        ];
    }
}
