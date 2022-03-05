<?php

namespace Check24\Database\Managers\Contracts;

interface DatabaseManager
{
    public function connect() :\PDO;

    public function query(string $query , $value = []) ;

    public function create($data);

    public function read($columns = '*' , $filter = null);

    public function update($id,$data);

    public function delete($id);

    public function relationManyToMany($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter=null);


}