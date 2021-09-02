<?php

namespace App\Rules;

use App\Models\Subscription;
use Illuminate\Contracts\Validation\Rule;

class UniqueMail implements Rule
{
    protected $website_id;

    /**
     * Create a new rule instance.
     *
     * @param $id
     * @return void
     */
    public function __construct($id)
    {
        $this->website_id = $id;
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
        $checkEmail = Subscription::where(['website_id' => $this->website_id, 'user_email' => $value])->first();
        if ($checkEmail) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The current email has already been signed';
    }
}
