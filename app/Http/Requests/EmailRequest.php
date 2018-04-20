<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
            "to"      => "required|email",
            "subject" => "required",
            "msg"     => "required",
            "docs"     => "required"
        ];
    }

    public function messages()
    {
        return [

            'to.required'      => "Digite um destinatário",
            'to.email'          => "Digite um destinatário válido",
            'subject.required' => "Digite o Assunto",
            'msg.required'     => "Por favor digite o texto do corpo do email",
            'docs.required'     => "Insira a documentação",

        ];
    }
}
