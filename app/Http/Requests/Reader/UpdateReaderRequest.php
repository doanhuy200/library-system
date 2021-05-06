<?php

namespace App\Http\Requests\Reader;

use App\Enums\GenderType;
use Illuminate\Foundation\Http\FormRequest;

class UpdateReaderRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'gender'    => 'required|in:' . implode(',', array_keys(GenderType::ARRAY_GENDER)),
            'age'       => 'required|numeric|min:0',
            'address'   => 'required|string',
        ];
    }
}
