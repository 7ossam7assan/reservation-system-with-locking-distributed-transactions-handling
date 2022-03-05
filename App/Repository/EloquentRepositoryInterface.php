<?php

namespace App\Repository;

//use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Model;
interface EloquentRepositoryInterface
{
    public function all();

    public function create(array $attributes);

    public function find(array $data) ;

    public function update(array $attributes , $id);

    public function delete($id);


}