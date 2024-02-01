<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'min:5', 'max:300', 'unique:projects'],
            'description' => ['required'],
            'type_id' => ['nullable', 'exists:types,id'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'technologies'=>['exists:technologies,id']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title of the project is required',
            'title.min' => 'Title lenght must be at least of :min letters',
            'title.max' => 'Title lenght must max of :max letters',
            'title.unique' => 'This title is already used. Try another',
            'description.required' => 'Description of the project is required',
            'technologies.exists' => 'Select a valid technologies option'
        ];
    }
}
