<?php

namespace App\Http\Requests\Education;

use App\Rules\EndDateGreaterThanStartDate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEducationRequest extends FormRequest
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
            'institution' => 'sometimes|max:200',
            'title' => 'sometimes|max:200',
            'activities' => 'sometimes',
            'document' => 'sometimes',
            'start_date' => 'sometimes|date_format:Y-m-d',
            'end_date' => ['date_format:Y-m-d', new EndDateGreaterThanStartDate]
        ];
    }
}
