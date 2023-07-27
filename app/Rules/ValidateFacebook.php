<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateFacebook implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $facebook_url = preg_match('#https?\://(?:www\.)?facebook\.com/(\d+|[A-Za-z0-9\.]+)/?#', $value);

        if(!$facebook_url) {
            $fail("Phải đúng định dạng facebook");
        }
    }
}
