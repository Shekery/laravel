<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoredocumentTypesRequest extends FormRequest
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
            'start_number',
            'type_traffic' => 'required',
            'id_design_name_doc',
            'id_design_comment',
            'organization_id' => 'required',
            'instruct_file',
            'ability_to_clone' => 'required',
            'ability_to_work' => 'required'
        ];
    }
}
