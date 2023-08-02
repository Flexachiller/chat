<?php

namespace flexachiller\chat\Controller;

use flexachiller\chat\Core\Cookie;
use flexachiller\chat\Core\Post;
use flexachiller\chat\Core\Session;
use flexachiller\chat\Core\View;

class LoginController{
    public function main_action(){
        $session = new Session();
        $post = new Post();
        $view = new View();
        $cookie = new Cookie();

        

        if(!$session->has('login') && $post->has('user_login')){
            $session->add('login', $post->get('user_login'));
        }

        $login = $session->get('login');
        if($login){
            header('Location: /chat');
        }

        $view->render('login', [
            'theme'=>$cookie->get('theme')
        ]);
    }

    public function logout_action(){
        $session = new Session();
        $session->delete('login');
        header('Location: /chat/login');
}
}