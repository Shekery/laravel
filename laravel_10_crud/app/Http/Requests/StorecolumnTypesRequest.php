<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecolumnTypesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'type',
            'classes',
            'type_template',
            'type_input',
            'select_options',
            'div_row_classes'
        ];
    }
}
