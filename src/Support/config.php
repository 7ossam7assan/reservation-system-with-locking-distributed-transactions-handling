<?php

namespace Check24\Support;

class config implements \ArrayAccess
{
    protected array $items = [];

    public function __construct($items)
    {
        foreach ($items as $key => $item){
            $this->items[$key] = $item;
        }
    }

    public function get($key , $default = null){
        if(is_array($key)){
            return $this->getMany($key);
        }
        return Arr::get($this->items , $key , $default);
    }
    public function set($key , $value= null){
        $keys = is_array($key) ? $key : [$key => $value];
        foreach ($keys as $key => $value){
            Arr::set($this->items, $key , $value);
        }
    }
    // add element to end of array
    public function push($key , $value){
        $array = $this->get($key);
        $array[] = $value;

        $this->set($key,$value);
    }

    public function all(){

        return $this->items;
    }

    public function exists($key){
        return Arr::exists($this->items , $key);
    }

    public function getMany($keys){
        $config = [];

        foreach ($keys as $key => $default) {
            if(is_numeric($key)){
                [$key , $default] = [$default , null];
            }
            $config[$key] = Arr::get($this->items , $key , $default);
        }
        return $config;
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
        return $this->get($offset);
    }
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
        return $this->set($offset,$value);
    }
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
        return $this->exists($offset);
    }
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
        return $this->set($offset,null);
    }


}