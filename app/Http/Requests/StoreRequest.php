<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'min:16',
                'regex:/[A-Z]/',      // setidaknya satu huruf kapital
                'regex:/[0-9]/',      // setidaknya satu angka
                'regex:/[@$!%*#?&]/', // setidaknya satu karakter spesial
            ],
            'confirm' => 'required|same:password',
            'nik' => 'required',
            'name' => 'required',
            'status' => 'required',
            'dept' => 'required',
            'jabatan' => 'required',
            'acceptTerms' => 'accepted',
        ];
    }

    public function messages()
    {
        return [
            'acceptTerms.accepted' => 'Anda harus menyetujui syarat dan ketentuan.',
        ];
    }
}
