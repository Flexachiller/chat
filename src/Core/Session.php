<?php

namespace flexachiller\chat\Core;

class Session {

    use ServerArrayAccessTrait;
    use MutableServerArrayTrait;

    public function __construct(){
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        
        $this->server_array = &$_SESSION;
    }

    public function clear(){
        session_destroy();
    }
}