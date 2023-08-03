<?php

namespace flexachiller\chat\Controller;

use flexachiller\chat\Core\Cookie;
use flexachiller\chat\Core\Post;
use flexachiller\chat\Core\Session;
use flexachiller\chat\Core\View;
use flexachiller\chat\Utils\CaptchaWrapper;

class LoginController{
    public function main_action(){
        $session = new Session();
        $post = new Post();
        $view = new View();
        $cookie = new Cookie();
        $captcha_wrapper = new CaptchaWrapper;

        

        if(!$session->has('login') && 
            $post->has('user_login') &&
            $captcha_wrapper->check_captcha($post->get('captcha'))
        ){
            $session->add('login', $post->get('user_login'));

        }

        $login = $session->get('login');
        if($login){
            header('Location: /chat');
        }

        $view->render('login', [
            'theme'=>$cookie->get('theme'),
            'captcha'=>$captcha_wrapper->get_captcha()
        ]);
    }

    public function logout_action(){
        $session = new Session();
        $session->delete('login');
        header('Location: /chat/login');
}
}