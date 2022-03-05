<?php

namespace Check24\Database;

use App\Models\Model;
use Check24\Database\Concerns\ConectsTo;
use Check24\Database\Managers\Contracts\DatabaseManager;

class DB
{
    protected DatabaseManager $manager;

    public function __construct(DatabaseManager $manager)
    {
        $this->manager = $manager;
    }
    public function init()
    {
        ConectsTo::connect($this->manager);
    }

    public function raw(string $query , $value = [])
    {
        return $this->manager->query($query,$value);
    }
    public function create(array $data)
    {
        return $this->manager->create($data);
    }
    public function update($id , array $data)
    {
        return $this->manager->update($id , $data);
    }
    public function delete($id)
    {
        return $this->manager->delete($id);
    }
    public function read($columns = '*' , $filter = null) : array
    {
        return $this->manager->read($columns,$filter);

    }
    public function relations($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter)
    {
        return $this->manager->relationManyToMany($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter);
    }
    public function __call($name , $arguments)
    {
        if(method_exists($this,$name)){
            return call_user_func_array([$this,$name],$arguments);
        }
    }


}