<?php

namespace App\Repository\Eloquent;

use App\Models\Article;
use App\Repository\ArticleRepositoryInterface;
use App\Models\Model;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(new Article());
    }
    public function usersArticle($id)
    {
        return $this->model->usersArticle($id);
    }


}