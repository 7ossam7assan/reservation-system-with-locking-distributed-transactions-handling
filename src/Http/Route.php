<?php

namespace Check24\Http;


use Check24\View\View;

class Route
{
    public Request $request;
    public Response $response;
    protected static array $routes = [];

    public function __construct(Request $request , Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static function get($route,callable|array|string $action){

        self::$routes['get'][$route] = $action;

    }

    public static function post($route,callable|array|string $action){

        self::$routes['post'][$route] = $action;

    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = self::$routes[$method][$path] ?? false;
        if(!array_key_exists($path,self::$routes[$method])){
            $this->response->setStatusCode(404);
            View::makeError('404');
        }
        if($this->request->getParams() && is_array($callback) ){
            call_user_func_array([new $callback[0],$callback[1]],[$this->request->getParams()]);
        }
        if(is_string($callback)){
//            return $this->renderView($callback);
        }
        if (is_array($callback))
        {
//            Application::$app->controller = new $callback[0]();
//            $callback[0] = Application::$app->controller;
            call_user_func_array([new $callback[0],$callback[1]],[]);

        }
        if(is_callable($callback)){
            call_user_func_array($callback,[]);

        }
//        return call_user_func($callback,[]);
    }

}
