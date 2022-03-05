<?php

namespace Check24\Database\Managers;

use App\Models\Model;
use Check24\Database\Grammers\MySQLGrammer;
use Check24\Database\Managers\Contracts\DatabaseManager;

class MysqlManager implements DatabaseManager
{
    protected static $instance;
     public function connect(): \PDO
     {
         if(!self::$instance){
             self::$instance = new \PDO(env('DB_DRIVER').":host=".env('DB_HOST') . ";dbname=" .env('DB_DATABASE'),env('DB_USERNAME'),env('DB_PASSWORD'));
         }
         return self::$instance;

     }
    public function query(string $query, $value = [])
    {
        $stmt = self::$instance->prepare($query);
        for($i = 1 ;$i <= count($value);$i++){
            $stmt->bindValue($i , $value[$i - 1]);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function read($columns = '*', $filter = null)
    {
        $query = MySQLGrammer::buildSelectQuery($columns,$filter);
        $stmt = self::$instance->prepare($query);
        if($filter){
            foreach ($filter as $key => $bind){
                $stmt->bindValue($key+1,$bind[2]);
            }
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS,Model::getModel());

    }
    public function delete($id)
    {
        $query = MySQLGrammer::buildDeleteQuery();

        $stmt = self::$instance->prepare($query);
        $stmt->bindValue(1,$id);
        return $stmt->execute();
    }
    public function update($id, $attributes)
    {
        $query = MySQLGrammer::buildUpdateQuery(array_keys($attributes));
        $stmt = self::$instance->prepare($query);
        for ($i = 1;$i <= count($values = array_values($attributes));$i++){
            $stmt->bindValue($i , $values[$i - 1]);
            if($i == count($values)){
                $stmt->bindValue($i + 1 ,$id);
            }
        }

        return $stmt->execute();

    }
    public function create($data)
    {
        $query = MySQLGrammer::buildInsertQuery(array_keys($data));
        $stmt = self::$instance->prepare($query);
        for ($i = 1;$i <= count($values = array_values($data));$i++){
            $stmt ->bindValue($i , $values[$i - 1]);
        }
        return $stmt->execute();
    }
    public function relationManyToMany($tableName,$pivotTable,$baseCloumn,$secondColumn,$filter=null)
    {
        $query = MySQLGrammer::buildManyToMany($tableName,$pivotTable,$baseCloumn,$secondColumn);
        $stmt = self::$instance->prepare($query);
        if($filter){
//            foreach ($filter as $key => $bind){
//                $stmt->bindValue($key+1,$bind[2]);
//            }
            $stmt->bindValue(1,$filter);
        }
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }
}