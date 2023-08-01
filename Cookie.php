<?php
require_once "ServerArrayAccessTrait.php";
require_once "MutableServerArrayTrait.php";

class Cookie {

    use ServerArrayAccessTrait;
    use MutableServerArrayTrait{
        add as private trait_add;
        delete as private trait_delete;
    }

    public function __construct(){
        $this->server_array = $_COOKIE;
    }

    public function add(string $key, $value){
        setcookie($key, $value);
        $this->trait_add($key, $value);
    }

    public function delete(string $key){
        setcookie($key, '', -1);
        $this->trait_delete($key);
    }

    public function clear(){
        foreach($this->server_array as $key => $value){
            $this->delete($key);
        }
    }

}