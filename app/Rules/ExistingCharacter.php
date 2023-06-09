<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\characters;

class ExistingCharacter implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $item = characters::where('name', '=', $value)->first();

        return $item;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No such character in our database!';
    }
}
