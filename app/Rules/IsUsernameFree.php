<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class IsUsernameFree implements Rule
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
        $currentUsername=Auth::user()->username;
        $res = User::select("username")->where('username','=',$value)->get();
        return ($currentUsername == $value or ! $res->all());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This username is taken.';
    }
}
