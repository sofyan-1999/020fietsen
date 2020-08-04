<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
            'voornaam' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:100'],
            'tussenvoegsel' => ['nullable', 'regex:/^[a-zA-Z ]+$/'],
            'achternaam' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }
}
