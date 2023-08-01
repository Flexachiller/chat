<?php

class Router{

    public function run(){
        $session_storage = new Session();
        $login = $session_storage->get("login", null);

        if(!$login){
            $login_controller = new LoginController();
            $login_controller->main_action();
        }else{
            $chat_controller = new ChatController();
            $chat_controller->main_action();
        }
    }
}