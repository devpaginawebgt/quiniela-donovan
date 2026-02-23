<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ApiLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numero_documento' => ['required', 'integer', 'digits:13'],
            // 'email' => ['required', 'string', 'email', 'exists:users,email'],
            // 'password' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        
        return [
            'numero_documento.required' => 'Por favor ingrese su número de documento.',
            'numero_documento.integer'  => 'Ingresa un número de documento válido (solo números).',
            'numero_documento.digits'   => 'Ingresa un número de documento válido (debe contener 13 dígitos).',
            // 'email.required' => 'Por favor llene el campo correo electrónico.',
            // 'email.string' => 'El correo electrónico debe contener texto.',
            // 'email.email' => 'Por favor ingrese un correo electrónico válido.',
            // 'email.exists' => 'No encontramos un usuario con esta dirección de correo electrónico.',

            // 'password.required' => 'Por favor llene el campo contraseña.',
            // 'password.string' => 'La contraseña debe contener texto.',
        ];
        
    }
}
