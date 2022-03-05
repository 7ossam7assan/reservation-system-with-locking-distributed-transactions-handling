<?php

namespace Check24\Validation;

trait RulesResolver
{
    public static function resolveRules($rules)
    {
        $rules = (array) (str_contains($rules,'|') ? explode('|',$rules) : $rules);

        return array_map(function ($rule){
            if(is_string($rule)){
                return  self::getRuleFromString($rule);
            }
            return $rule;
        },$rules);
    }

    public static function getRuleFromString($rule)
    {
        $exploded = explode(':',$rule);
        $rule = $exploded[0];
        $options =explode(',',end($exploded));
        return  RuleMapper::resolve($rule,$options);
    }

}