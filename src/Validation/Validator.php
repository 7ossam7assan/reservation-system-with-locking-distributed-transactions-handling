<?php

namespace Check24\Validation;


use Check24\Validation\Rules\AlphaNumericalRule;
use Check24\Validation\Rules\BetweenRule;
use Check24\Validation\Rules\Contract\Rule;
use Check24\Validation\Rules\MaxRule;
use Check24\Validation\Rules\RequiredRule;

class Validator
{
    protected array $data = [];
    protected array $aliases = [];
    protected array $rules = [];
    protected ErrorBag $errorBag;


    public function make($data)
    {
        if(!empty($data)){
            $this->data = $data;
            $this->errorBag = new ErrorBag();
            $this->validate();
        }

    }

    protected function validate()
    {
        foreach ($this->rules as $field => $rules){
            foreach (RulesResolver::resolveRules($rules) as $rule){
                $this->applyRule($field,$rule);
            }
        }

    }

    protected function applyRule($field,Rule $rule)
    {
//        if(is_string($rule)){
//            $rule = new $this->ruleMap[$rule];
//        }
        if(!$rule->apply($field,$this->getFieldValue($field),$this->data)){
            $this->errorBag->add($field, Message::generate($rule,$this->alias($field)));
        }
    }



    public function getFieldValue($field)
    {
        return $this->data[$field] ?? null;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function passess()
    {

        return empty($this->errorBag->errors);
    }

    public function errors($key = null)
    {
        return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
    }

    public function alias($field)
    {
        return $this->aliases[$field] ?? $field;
    }

    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }


}