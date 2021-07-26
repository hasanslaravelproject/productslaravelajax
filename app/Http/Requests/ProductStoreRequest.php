<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'date' => ['required', 'date'],
            'color' => ['required'],
            'size' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'unit_price' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'vat' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'image' => ['nullable', 'image', 'max:1024'],
            'status' => ['required', 'in:active,inactive'],
            'sub_category_id' => ['required', 'exists:sub_categories,id'],
            'store_id' => ['required', 'exists:stores,id'],
        ];
    }
}
