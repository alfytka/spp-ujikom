<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nisn' => ['required', 'string', 'unique:users', 'max:20'],
            'nis' => ['required', 'string', 'unique:users', 'max:20'],
            'name' => ['required', 'string', 'max:100'],
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'email' => ['required', 'string', 'unique:users', 'max:50'],
            'username' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:5'],
            'telepon' => ['required', 'numeric'],
            'alamat' => ['string'],
        ];
    }
}
