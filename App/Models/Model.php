<?php

namespace App\Models;


use Check24\Support\Str;

abstract class Model
{
    protected static $instance;

    public  function create(array $attributes)
    {
        self::$instance = static::class;

        return app()->db->create($attributes);
    }

    public  function all()
    {
        self::$instance = static::class;
        return app()->db->read();
    }

    public  function update($id , array $attributes)
    {
        self::$instance = static::class;
        return app()->db->update($id,$attributes);
    }

    public  function delete($id)
    {
        self::$instance = static::class;
        return app()->db->delete($id);
    }

    public  function where($filter , $columns = '*'): array
    {
        self::$instance = static::class;
        return app()->db->read($columns , $filter);
    }
    public static function getModel()
    {
        return self::$instance;
    }
    public static function getTableName()
    {
        return Str::lower(Str::plural(class_baseName(self::$instance)));

    }
    public static function belongsToMany($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter)
    {
        self::$instance = static::class;
        return app()->db->relations($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter);
    }
}