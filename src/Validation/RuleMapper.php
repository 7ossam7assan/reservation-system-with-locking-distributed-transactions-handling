<?php

namespace Check24\Validation;

use Check24\Validation\Rules\AlphaNumericalRule;
use Check24\Validation\Rules\BetweenRule;
use Check24\Validation\Rules\ConfirmedRule;
use Check24\Validation\Rules\EmailRule;
use Check24\Validation\Rules\MaxRule;
use Check24\Validation\Rules\RequiredRule;
use Check24\Validation\Rules\UniqueRule;

trait RuleMapper
{
    protected static array $map = [
        'required' => RequiredRule::class,
        'alnum' => AlphaNumericalRule::class,
        'max'=> MaxRule::class,
        'between'=> BetweenRule::class,
        'email'=> EmailRule::class,
        'confirmed'=>ConfirmedRule::class,
        'unique'=>UniqueRule::class
    ];

    public static function resolve(string $rule , $options)
    {
        return new self::$map[$rule](...$options);

    }

}