<?php
namespace Check24;
use Check24\Database\DB;
use Check24\Database\Managers\MysqlManager;
use Check24\Http\Request;
use Check24\Http\Response;
use Check24\Http\Route;
use Check24\Support\config;
use Check24\Support\Session;

class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected config $config;
    protected DB $db;
    protected Session $session;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->route = new Route($this->request,$this->response);
        $this->config = new config($this->loadConfigurations());
        $this->db = new DB($this->getDatabaseDriver());
        $this->session = new Session();
    }

    // for custom db driver
    protected function getDatabaseDriver(){
        return match(env('DB_DRIVER')){
            'mysql'=> new MysqlManager(),
            'defualt'=> new MysqlManager()
        };
    }

    protected function loadConfigurations()
    {
        foreach(scandir(config_path()) as $file){
            if($file == '.' || $file == '..'){
                continue;
            }
             $filename = explode('.' , $file)[0];
            yield $filename => require config_path() . $file;
        }
    }
    public function run()
    {
        $this->db->init();
        return $this->route->resolve();
    }
    public function __get(string $name)
    {
        // TODO: Implement __get() method.
        if(property_exists($this,$name)){
            return $this->$name;
        }
    }
}