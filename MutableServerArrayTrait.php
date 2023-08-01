<?php

trait MutableServerArrayTrait{

    private array $server_array;

    public function add(string $key, $value){
        $this->server_array[$key] = $value;
    }

    public function delete(string $key){
        unset($this->server_array[$key]);
    }

    public abstract function clear();
}