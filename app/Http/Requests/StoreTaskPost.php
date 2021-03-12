<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskPost extends FormRequest
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
            'name' => 'bail|required|max:255|min:5',
            'description' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '제목은 필수 입니다.',
            'description.required'  => '내용은 필수 입니다.',
        ];
    }
}
