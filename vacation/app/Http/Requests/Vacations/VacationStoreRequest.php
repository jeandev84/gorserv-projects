<?php

namespace App\Http\Requests\Vacations;

use Illuminate\Foundation\Http\FormRequest;

class VacationStoreRequest extends FormRequest
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
            'date_start_at'   => 'required|string',
            'date_end_at'     => 'required|string'
        ];
    }
}
