<?php

namespace Check24\Validation\Rules;

use Check24\Validation\Rules\Contract\Rule;

class RequiredRule implements Rule
{
    public function apply($field, $value, $data)
    {
        return !empty($value);
    }
    public function __toString()
    {
        return "%s is required and cannot be empty";
    }
}