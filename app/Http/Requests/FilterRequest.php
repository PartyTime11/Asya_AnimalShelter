<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    protected $redirectRoute = 'error404';

    public function rules(): array
    {
        return [
            'kind_of_animal' => 'nullable|string|in:dog,cat',
            'gender' => 'nullable|string|in:male,female',
            'age' => 'nullable|integer|min:0',
            'type_of_fur' => 'nullable|string|in:short,long',
            'colour' => 'nullable|string|in:white,black,grey,brown,ginger,golden',
            'size' => 'nullable|string|in:small,medium,big',
            'temper' => 'nullable|string|in:calm,energetic',
        ];
    }
}
