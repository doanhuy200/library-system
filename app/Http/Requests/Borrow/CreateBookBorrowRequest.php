<?php

namespace App\Http\Requests\Borrow;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class CreateBookBorrowRequest extends FormRequest
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
            'expired_at' => 'required|date',
            'reader_id'  => 'required|exists:readers,id',
        ];
    }
}
