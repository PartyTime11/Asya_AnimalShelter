<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'name' => 'required|string|unique:animals,name',
            'kind_of_animal' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|integer',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
