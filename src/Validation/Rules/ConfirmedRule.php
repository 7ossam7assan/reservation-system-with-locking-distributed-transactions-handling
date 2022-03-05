<?php

namespace Check24\Validation\Rules;

use Check24\Validation\Rules\Contract\Rule;

class ConfirmedRule implements Rule
{
    public function apply($field, $value, $data)
    {
        return ($data[$field]=== $data[$field . "_confirmation"]);
    }

    public function __toString()
    {
        return '%s does not match %s confirmation';
    }

}