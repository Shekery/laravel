<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentTypesCreateRequest extends FormRequest
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
            'start_number' => 'required',
            'type_traffic' => 'required',
            'id_design_name_doc' => 'required',
            'id_design_comment' => 'required',
            'code_organization' => 'required',
            'instruct_file' => 'required',
            'ability_to_clone' => 'required',
            'ability_to_work' => 'required'
        ];
    }
}
