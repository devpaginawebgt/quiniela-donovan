<?php

namespace App\Http\Requests\UserPushToken;

use App\Http\Services\HelperService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPushTokenRequest extends FormRequest
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
            'device_token' => ['required', 'string', 'min:1', 'max:1024'],
            'device_platform' => ['required', 'string', Rule::in(['android', 'ios'])],
            'is_active' => ['boolean'],
        ];
    }
    
}
