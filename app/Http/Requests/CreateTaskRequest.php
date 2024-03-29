<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|max:18',
            'description'=> 'required',
            'executor' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Название',
            'description'=> 'Описание',
            'executor' => 'Исполнитель'
        ];
    }
}
