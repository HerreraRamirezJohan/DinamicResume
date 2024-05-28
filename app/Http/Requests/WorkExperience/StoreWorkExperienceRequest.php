<?php

namespace App\Http\Requests\WorkExperience;

use App\Rules\EndDateGreaterThanStartDate;
use Illuminate\Foundation\Http\FormRequest;

class StoreWorkExperienceRequest extends FormRequest
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
            "job_title" => 'required|max:150',
            "employer" => 'required|max:150',
            "start_date" => 'required|date_format:Y-m-d',
            "end_date" => ['date_format:Y-m-d', new EndDateGreaterThanStartDate],
            "description" => 'required'
        ];
    }
}
