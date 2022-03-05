<?php

namespace Check24\Validation\Rules;

use Check24\Validation\Rules\Contract\Rule;

class UniqueRule implements Rule
{
    protected $table;
    protected $column;

    public function __construct($table,$column)
    {
        $this->table = $table;
        $this->column = $column;
    }

    public function apply($field, $value, $data)
    {
        return (app()->db->raw("SELECT * FROM {$this->table} WHERE {$this->column} = ?",[$value]));
    }
    public function __toString()
    {
        return 'This %s is already taken';
    }

}