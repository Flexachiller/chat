<?php

namespace flexachiller\chat\Core;

trait ServerArrayAccessTrait{

    private array $server_array;

    public function get(string $key, $default=null){
        return $this->server_array[$key] ?? $default;
    }

    public function has(string $key){
        return isset($this->server_array[$key]);
    }
}