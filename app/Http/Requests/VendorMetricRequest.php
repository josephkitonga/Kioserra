<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorMetricRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'store_id' => 'required|exists:stores,id',
            'product_count' => 'integer|min:0',
            'order_count' => 'integer|min:0',
            'last_login' => 'nullable|date',
            'status' => 'required|in:active,suspended',
        ];
    }
}
