<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpSiswaRequest extends FormRequest
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
            'nisn' => ['required', 'string'],
            'nis' => ['required', 'string'],
            'name' => ['required', 'string'],
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'email' => ['required', 'string'],
            'username' => ['required', 'string'],
            'telepon' => ['string'],
            'alamat' => ['string'],
        ];
    }
}
