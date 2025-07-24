<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'customer_id' => 'required|exists:store_customers,id',
            'product_ids' => 'required|json',
            'total_price' => 'required|numeric|min:0',
            'payment_method' => 'required|in:mpesa,card,cash',
            'status' => 'required|in:pending,complete,delivered,cancelled',
        ];
    }
}
