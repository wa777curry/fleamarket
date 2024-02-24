<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'postcode' => ['required', 'string', 'digits:7'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'postcode.required' => '※郵便番号を入力してください',
            'postcode.string' => '※郵便番号を文字列で入力してください',
            'postcode.digits' => '※郵便番号を7文字で入力してください',
            'address.required' => '※住所を入力してください',
            'address.string' => '※住所を文字列で入力してください',
            'address.max' => '※住所を255文字以内で入力してください',
            'building.string' => '※建物名を文字列で入力してください',
            'building.max' => '※建物名を255文字以内で入力してください',
        ];
    }
}
