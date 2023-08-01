<?php
require_once "ServerArrayAccessTrait.php";

class Post{

    use ServerArrayAccessTrait;

    public function __construct(){

        $this->server_array = $_POST;
    }
}