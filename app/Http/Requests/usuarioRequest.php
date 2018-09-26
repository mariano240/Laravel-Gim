<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|alpha|string|max:65',
            'apellido' => 'required|alpha|string|max:65',
            'email' => 'required|string|email|max:100|unique:users',
            'telefono' => 'string|max:255',
            'dni' => 'required|numeric|unique:users'
        ];
    }
}
