<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateTargetValueRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!empty(request()->location)) {
            // Validate for location value

            // Required
            if(empty($value)) {
                $fail(':attribute must not be empty');
            }

            switch (request()->location) {
                case '1':
                case '2':
                case '3':
                    
                    break;

                case '4':

                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }
}
