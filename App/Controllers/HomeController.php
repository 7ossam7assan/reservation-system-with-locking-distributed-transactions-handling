<?php
namespace App\Controllers;


use App\Models\User;

class HomeController
{

    public function index(){

//        User::create(
//            [
//                'name' => 'sayed1',
//                'email' => 'sayed@yahoo.com',
//                'password' => '123456'
//            ]
//        );
//        $user = User::all()->toArray();

//        return view('home',compact('user',$user));
        return view('home');
//       return view::make('home');
    }
}