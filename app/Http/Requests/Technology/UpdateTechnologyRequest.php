<?php

namespace App\Http\Requests\Technology;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:50', Rule::unique('technologies')->ignore($this->technology)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name of the technology is required',
            'name.max' => 'Name lenght must max of :max letters',
            'name.unique' => 'This name is already used. Try another'
        ];
    }
}
