<?php

namespace Check24\Support;

class Hash
{
    public static function password($value)
    {
        return password_hash($value,PASSWORD_BCRYPT);
    }

    public static function verify($value,$hashedValue)
    {
        return password_verify($value,$hashedValue);
    }

    public static function make($value)
    {
        return sha1($value.time());
    }
}