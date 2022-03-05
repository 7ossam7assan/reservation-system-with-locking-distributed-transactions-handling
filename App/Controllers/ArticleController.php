<?php

namespace App\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Check24\Validation\Validator;

class ArticleController
{
    protected $validator;
    protected ArticleService $articleService;
    public function __construct( )
    {
        $this->validator = new Validator();
        $this->articleService = new ArticleService();

    }

    public function index()
    {
        try {
            $userArticleData = $this->articleService->findArticleByUserID();
            return view('articles.index',compact('userArticleData',$userArticleData));
        }catch (\Exception $e){
            $result= [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }


        return response()->json($result,$result['status']);

    }
    public function create()
    {
        return view('articles.post');
    }
    public function store()
    {

        $this->validator->setRules([
            'user_id'=>'required',
            'image'=>'required',
            'title'=>'required|alnum',
            'description'=>'required|alnum',
        ]);

        $this->validator->make(request()->all());
        if(!$this->validator->passess()){
            app()->session->setFlash('errors',$this->validator->errors());
            app()->session->setFlash('old',request()->all());
            return back();
        }
        $data = [
            'user_id'=>request('user_id'),
            'image'=>request('image'),
            'title'=>request('title'),
            'description'=>request('description')
        ];

        try {
            $this->articleService->savePostData($data);
            header('location:'.'/');
        }catch (\Exception $e){
            $result= [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);
    }

    public function show($id)
    {
        $result = ['status'=>200];
        try {
            $array = [['id','=',$id]];
            $articleData = $this->articleService->findByID($array);
            if($articleData)
                return view('articles.show',compact('articleData',$articleData));
            else
                return view('errors.404');
        }catch (\Exception $e){
            $result= [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }
        return response()->json($result,$result['status']);

    }

}