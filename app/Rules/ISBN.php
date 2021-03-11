<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ISBN implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = str_replace('-','',$value);
        return preg_match('/^(\d{13})$/i', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ISBN should have 13 digits.';
    }
}
