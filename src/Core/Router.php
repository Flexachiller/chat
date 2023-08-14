<?php

namespace flexachiller\chat\Core;

use flexachiller\chat\Controller\ChatController;
use flexachiller\chat\Controller\LoginController;

class Router{

    private array $routes = [
        '/chat/'=>[ChatController::class],
        '/chat/login'=>[LoginController::class],
        '/chat/logout'=>[LoginController::class, 'logout_action']
    ];

    public function run(){
        $uri = $_SERVER['REQUEST_URI'];
        if(!isset($this->routes[$uri])){
            echo '404<br>';
            echo '<a href="/chat/">Вернуться на главную</a>';
            exit;
        }

        $controller = new $this->routes[$uri][0];
        $action = $this->routes[$uri][1] ?? "main_action";
        $controller->$action();
    }
}