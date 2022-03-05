<?php

namespace App\Controllers;

use App\Services\UserService;
use Check24\Validation\Validator;
use App\Models\User;

class UserController
{
    private $userService;
    private $validator;
    public function __construct()
    {
        $this->validator = new Validator();
        $this->userService = new UserService();
    }

    public function create()
    {
        return view('auth.login');
    }
    public function login()
    {
        $this->validator->setRules([
            'username'=>'required|alnum',
            'password'=>'required|alnum',
        ]);
        $this->validator->make(request()->all());
        if(!$this->validator->passess()){
            app()->session->setFlash('errors',$this->validator->errors());
            app()->session->setFlash('old',request()->all());

            return back();
        }
        $array = [['username','=',request('username')],['password','=',request('password')]];
        try {
            $this->userService->login($array);
            header('location:'.'/');
        }catch (\Exception $e){
            $result= [
                'status'=>500,
                'error'=>$e->getMessage()
            ];
        }

        return response()->json($result,$result['status']);
    }

    public function logout()
    {
        if(app()->session->has('user')) app()->session->remove('user')? : header('location:'.'/login');
    }

}