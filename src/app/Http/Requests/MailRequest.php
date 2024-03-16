<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'email' => ['required', 'string', 'email'],
            'subject' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:150'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '※メールアドレスを入力してください',
            'email.string' => '※メールアドレスを文字列で入力してください',
            'email.email' => '※有効なメールアドレス形式を入力してください',
            'subject.required' => '※件名を入力してください',
            'subject.string' => '※件名は文字列で入力してください',
            'subject.max' => '※件名は50文字以内で入力してください',
            'message.required' => '※メッセージを入力してください',
            'message.string' => '※メッセージは文字列で入力してください',
            'message.max' => '※メッセージは150文字以内で入力してください',
        ];
    }
}
