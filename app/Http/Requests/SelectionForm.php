<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SelectionForm extends FormRequest
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
            'selection.documents_password'  => 'bail|max:20|nullable',
            'selection.remarks'             => 'nullable',
            'selection.selection_status_id' => 'required',
            'selection.application_way_id'  => 'required',
            'selection.season_id'           => 'required',
            'selection.company_id'          => ''
        ];
    }
}
