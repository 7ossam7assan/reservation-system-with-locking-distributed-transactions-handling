<?php

namespace App\Models;

use App\Models\Model;

class Article extends Model
{
    public function usersArticle($id)
    {
        return $this::belongsToMany("users",'users_articles','article_id','user_id',$id);
    }
}