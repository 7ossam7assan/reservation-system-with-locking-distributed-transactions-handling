<?php

namespace Check24\Database\Grammers;

use App\Models\Model;
use Check24\Support\Str;

class MySQLGrammer
{
  public static function buildInsertQuery($keys)
  {
      $values = '';
      for($i= 1 ; $i <= count($keys) ; $i++){

          $values .= '?';
          if($i < count($keys)){
              $values .=', ';
          }

      }
     $query = "INSERT INTO " . Model::getTableName() . " (`".implode("`, `",$keys)."`) VALUES ($values)";
     return $query;
  }
  public static function buildSelectQuery($columns , $filter)
  {
      if(is_array($columns)){
          $columns = implode(', ',$columns);
      }
      $query = "SELECT {$columns} FROM " . Model::getTableName();
      if($filter){
          $query .=" WHERE ";
          $condition='';
          $oprator = '';
          for ($i = 0 ; $i <count($filter);$i++){
              $condition .= $filter[$i][0].' '.$filter[$i][1].' ?';
              if($i != count($filter)-1){
                  $oprator = " AND ";
              }
              $condition .= $oprator;
              $oprator='';
          }
          $query .= $condition;

      }
      return $query;
  }

    public static function buildManyToMany($tableName,$pivotTable,$baseCloumn,$secondColumn)
    {
        $query = "SELECT ".$tableName.".* FROM " . $tableName;
        $query .=" LEFT JOIN ".$pivotTable." ON (".$tableName.".id"." = ".$pivotTable.".".$secondColumn.")";
        $query .=" LEFT JOIN ".Model::getTableName()." ON (".$pivotTable.".".$baseCloumn." = ".Model::getTableName().".id)";
        $query .=" WHERE ".Model::getTableName().".id = ? ORDER BY created_at DESC";
        return $query;
    }

  public static function buildDeleteQuery()
  {
      return "DELETE FROM " . Model::getTableName() . ' WHERE ID = ?';
  }

    public static function buildUpdateQuery($keys)
    {
        $query = "UPDATE ". Model::getTableName() . " SET ";
        foreach ($keys as $key){
            $query .= "{$key} = ?, ";
        }
        $query = rtrim($query,', ') . ' WHERE ID = ? ';
        return $query;
    }

}