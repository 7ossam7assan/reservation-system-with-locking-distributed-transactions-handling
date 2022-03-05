<?php

namespace Check24\Http;

class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }
    public function back()
    {
        header('location:'.$_SERVER['HTTP_REFERER']);
    }

    public function json($array , $code = null)
    {
        header('Content-type: application/json');
        print_r(json_encode($array,$code));

    }

}