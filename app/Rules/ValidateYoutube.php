<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateYoutube implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $youtube = 'regex:/^https?:\/\/(?:www\.)?youtube\.com\/(?:watch\?v=|embed\/|v\/|channels\/(?:[\w\-]+\/|UC[\w\-]+|user\/[\w\-]+))([\w\-]{11})(?:[\?&][\w\-]+=[\w\-]+)*$/';

        if (!$youtube) {
            $fail("Phải đúng định dạng youtube");
        }
    }
}
