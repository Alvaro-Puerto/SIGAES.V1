<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
            'password' => ['required', 'min:6', 'confirmed', 'different:old_password'],
            'password_confirmation' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'La contrasena actual es requerida',
            'old_password.min' => 'La contrasena debe tener al menos 6 caracteres',
            'password.min' => 'La contrasena debe tener al menos 6 caracteres',
            'password.different' => 'La contrasena  debe ser diferente a tu contrasena anterior',
            'password_confirmation' => 'La confirmacion de contrasena es requerida'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'old_password' => __('current password'),
        ];
    }
}
