<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //

            'nis' => 'unique:students|max:10|required',
            'name' => 'required',
            'gender' => 'required',
            'class_id' => 'required'

        ];
    }
    public function attributes()
    {
        return [
            //

            'class_id' => 'Class'

        ];
    }
    public function messages()
    {
        return [
            //

            'nis.required' => 'NIS Wajib di isi',
            'nis.max' => 'NIS maksimal :max karakter',


        ];
    }
}
