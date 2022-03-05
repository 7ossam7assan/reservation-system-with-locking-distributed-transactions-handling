<?php

namespace Check24\Http;

use Check24\Support\Arr;

class Request
{

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

//    public function getPath(){
//        $path = $_SERVER['REQUEST_URI'] ?? '/';
//        $position = strpos($path, '?');
//        if ($position === false) return $path;
//        return substr($path,0,$position);
//    }

    public function getPath(){
//        /atricle?status=active
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) return $path;
        $newPath = explode('=',$path);
        if(!$newPath[1]) return substr($path,0,$position);
        return $newPath[0];
    }
    public function all()
    {
        return $_REQUEST;
    }
    public function get($key)
    {
        return Arr::get($this->all(),$key);
    }
    public function only($keys)
    {
        return Arr::only($this->all(),$keys);
    }
    public function getParams()
    {
        return $_GET['id'] ?? false;
    }

}