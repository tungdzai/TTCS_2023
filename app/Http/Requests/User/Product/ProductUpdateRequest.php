<?php

namespace App\Http\Requests\User\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|',
            'stock' => 'required|integer|min:0|max:10000',
            'expired_at' =>  'nullable|date|after:now',
            'avatar' => 'file|max:3072',
            'sku' => 'required|unique:products|alpha_num|min:10|max:20',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /** Error notification when occurring
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => __('messages.messages.required'),
            'name.max' => __('messages.messages.max'),

            "stock.required" => __('messages.messages.required'),
            'stock.integer' => __('messages.messages.integer'),
            'stock.min' => __('messages.messages.min'),
            'stock.max' => __('messages.messages.max'),

            'expired_at.date' => __('messages.messages.date'),
            'expired_at.after' => __('messages.messages.after'),

            'avatar.image' => __('messages.messages.format'),
            'avatar.max' => __('messages.messages.avatarMax'),

            'sku.required' => __('messages.messages.required'),
            'sku.unique' => __('messages.messages.unique'),
            'sku.alpha_num' => __('messages.messages.alpha_num'),
            'sku.min' => __('messages.messages.min'),
            'sku.max' => __('messages.messages.max'),

            'category_id.required' => __('messages.messages.required'),

        ];
    }
    /** Get attributes
     * @return array
     */
    public function attributes(): array
    {
        return __('messages.attributesProduct');

    }
}
