<?php

namespace App\Services;

use App\Repository\Eloquent\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    public function login($data){

       $userData =  $this->userRepository->find($data);
       if(!empty($userData) && isset($userData[0])){
           $userDataArray = $userData[0];
            app()->session->set('user',[$userDataArray->username,$userDataArray->id]);
            dump($this->userRepository->articles($userDataArray->id));
       }
       return $userData;
    }


}