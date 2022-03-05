<?php

namespace App\Services;

use App\Repository\Eloquent\ArticleRepository;
use App\Repository\ArticleRepositoryInterface;
use Check24\Support\Arr;

class ArticleService
{
    protected $postRepository;
    public function __construct()
    {
        $postRepository = new ArticleRepository();
        $this->postRepository = $postRepository;
    }
    public function savePostData($postData){

        return $this->postRepository->create($postData);
    }
    public function findByID($id)
    {
        if(app()->session->has('user')){
            $getArticleData = $this->postRepository->find($id);
            if ($getArticleData){
                $getArticleData[0]->usersArticle = $this->postRepository->usersArticle($getArticleData[0]->id);
                return (Arr::get($getArticleData,'0'));
            }
            return $getArticleData;
        }
    }
    public function findArticleByUserID()
    {
        if(app()->session->has('user')){
            $userId = app()->session->get('user')['user'][1];
            return $this->postRepository->find($userId);
        }
    }
    public function DeleteByID($id){
        return $this->postRepository->delete($id);
    }
    public function findUserId($id)
    {
        return $this->postRepository->userRepo->find($id);

    }
}