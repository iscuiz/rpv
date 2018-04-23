<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'password'=>"required|confirmed"
        ];
    }

    public function messages()
    {
        return [
            'password.required' => "O campo de senha é obrigatório",
            'password.confirmed' => "As senhas não conferem"
        ];
    }

}
