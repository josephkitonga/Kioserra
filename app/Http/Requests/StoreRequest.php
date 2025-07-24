<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:stores,slug,' . $this->route('store'),
            'logo_url' => 'nullable|url',
            'owner_id' => 'required|exists:users,id',
            'trial_expiry' => 'nullable|date',
            'status' => 'required|in:active,suspended',
            'whatsapp' => 'nullable|string|max:20',
        ];
    }
}
