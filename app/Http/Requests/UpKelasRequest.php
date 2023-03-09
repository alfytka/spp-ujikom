<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpKelasRequest extends FormRequest
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
        // $unique = Rule::unique('kelas')->ignore($this->request->kelas);

        return [
            'kelas' => ['required', 'string', 'max:10'],
            'kompetensikeahlian_id' => ['required', 'string']
        ];
    }
}
