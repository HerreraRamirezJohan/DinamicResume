<?php

namespace App\Http\Requests\ContactInformation;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactInformationRequest extends FormRequest
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
            'email_contact' => 'string|email',
            'github_url' => 'string|url:https',
            'linkedin_url' => 'string|url:https',
            'phone' => 'string|digits_between:8,14',
            'country' => 'string',
            'city' => 'string',
        ];
    }
}
