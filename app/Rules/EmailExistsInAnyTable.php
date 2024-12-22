<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EmailExistsInAnyTable implements Rule
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
        return DB::table('doctors')->where('email', $value)->exists() ||
               DB::table('students')->where('email', $value)->exists() ||
               DB::table('patients')->where('email', $value)->exists();
    }

    public function message()
    {
        return 'The :attribute does not exist in our records.';
    }
}
