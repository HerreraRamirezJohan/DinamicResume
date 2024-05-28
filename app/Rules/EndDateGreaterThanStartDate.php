<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

use function PHPSTORM_META\type;

class EndDateGreaterThanStartDate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $start_date = strtotime(request()->input('start_date'));
        $end_date = strtotime($value);
        if($end_date <= $start_date)
            $fail('The :attribute need be more than start date');
    }
}
