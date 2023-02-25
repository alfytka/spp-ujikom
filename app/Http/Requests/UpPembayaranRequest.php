<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpPembayaranRequest extends FormRequest
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
            // 'siswa_id' => ['required'],
            'tgl_bayar' => ['required'],
            'bulan_bayar' => ['required'],
            'tahun_bayar' => ['required'],
            'jumlah_bayar' => ['required', 'numeric'],
        ];
    }
}
