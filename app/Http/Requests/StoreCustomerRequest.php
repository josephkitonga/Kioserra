<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'customer_email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
            'credit_limit' => 'numeric|min:0',
            'credit_used' => 'numeric|min:0',
            'repayment_date' => 'nullable|date',
        ];
    }
}
