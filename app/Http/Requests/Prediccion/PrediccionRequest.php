<?php

namespace App\Http\Requests\Prediccion;

use Illuminate\Foundation\Http\FormRequest;

class PrediccionRequest extends FormRequest
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
            'predicciones' => ['required', 'array', 'min:1', 'max:20'],

            'predicciones.*.id_partido' => [
                'required',
                'integer',
                'exists:partidos,id',
                'distinct'
            ],

            'predicciones.*.prediccion_equipo_uno' => [
                'required',
                'integer',
                'min:0',
                'max:25',
            ],

            'predicciones.*.prediccion_equipo_dos' => [
                'required',
                'integer',
                'min:0',
                'max:25',
            ],
        ];
    }
}
