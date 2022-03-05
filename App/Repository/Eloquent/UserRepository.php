<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
//use Illuminate\Database\Eloquent\Model;
use App\Models\Model;
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new User());
    }
    public function articles($id)
    {
        return $this->model->articles($id);
    }

}