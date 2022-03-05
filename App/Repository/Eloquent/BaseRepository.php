<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\EloquentRepositoryInterface;
//use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Model;
class BaseRepository implements EloquentRepositoryInterface
{
    protected  $model;

    public function __construct(Model $model)
    {

        $this->model = $model;
    }

    public function all()
    {
        // TODO: Implement all() method.
        return $this->model->all();
    }
    public function create(array $attributes): bool
    {
        // TODO: Implement create() method.
        return $this->model->create($attributes);
    }
    public function find($data)
    {
        // TODO: Implement find() method.
        return $this->model->where($data);
    }

    public function update($id ,$attributes): bool
    {
        // TODO: Implement update() method.
        $modelId = $this->model->update($id,$attributes);

        return $modelId->update($attributes);

    }

    public function delete($id): bool
    {
        // TODO: Implement delete() method.
        return $this->model->delete($id);
    }



}