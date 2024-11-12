<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    protected $redirectRoute = 'error404';

    public function rules(): array
    {
        return [
            'kind_of_animal' => 'required|string|in:dog,cat',
            'gender' => 'required|string|in:male,female',
            'age' => 'required|integer|min:0',
        ];
    }
}
