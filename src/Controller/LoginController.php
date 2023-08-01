<?php

class LoginController{
    public function main_action(){
        $session = new Session();
        $post = new Post();
        $view = new View();
        $cookie = new Cookie();

        if(!$session->has('login') && $post->has('user_login')){
            $session->add('login', $post->get('user_login'));
        }
        $view->render('login', [
            'theme'=>$cookie->get('theme')
        ]);
    }

}