<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'condition_id' => ['required', 'integer'],
            'itemname' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'digits_between:1,8'],
            'item_url' => ['required', 'file', 'max:2048', 'mimes:jpg,png'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => '商品のカテゴリーを選択してください',
            'condition_id.required' => '商品の状態を選択してください',
            'itemname.required' => '※商品名を入力してください',
            'itemname.string' => '※商品名は文字列で入力してください',
            'itemname.max' => '※商品名は255文字以内で入力してください',
            'description.required' => '※商品の説明を入力してください',
            'description.string' => '※商品の説明は文字列で入力してください',
            'price.required' => '※価格を入力してください',
            'price.numeric' => '※価格は数字で入力してください',
            'price.digits_between' => '※価格は8桁までの設定にしてください',
            'item_url.required' => '※アップロードする画像を選択してください',
            'item_url.max' => '※アップロードできる画像の容量は2MB未満です',
            'item_url.mimes' => '※アップロードできるファイル形式はjpgまたはpngのみです',
        ];
    }
}