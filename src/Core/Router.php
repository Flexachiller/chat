<?php

class Router{

    private array $routes = [
        '/chat/'=>[ChatController::class],
        '/chat/login'=>[LoginController::class],
        '/chat/logout'=>[LoginController::class, 'logout_action']
    ];

    public function run(){
        $uri = $_SERVER['REQUEST_URI'];
        var_dump($uri);
        if(!isset($this->routes[$uri])){
            echo '404<br>';
            echo '<a href="/chat/">Вернуться на главную</a>';
            return;
        }

        $controller = new $this->routes[$uri][0];
        $action = $this->routes[$uri][1] ?? "main_action";
        $controller->$action();
    }
}