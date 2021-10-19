<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'date' => 'after:today',
            'starts_at' => 'prohibited_if:starts_at,null',
            'number_of_guests' => 'prohibited_if:number_of_guests,null',
        ];
    }

    public function messages()
    {
        return [
            'prohibited_if' => ':attributeを選択してください。',
            'after' => '明日以降の日付を指定してください。'
        ];
    }
}
