<?php

class ChatController{
    public function main_action(){
        $messages_storage = new MessagesStorage();
        $cookie = new Cookie();
        $session = new Session();
        $post = new Post();
        $view = new View();

        $message = $post->get("user_message", null);
        $login = $session->get("login", null);

        if($message && $login){
            if($message ==="set_night_theme"){
                $cookie->add('theme', 'night');
            }else if($message ==="set_light_theme"){
                $cookie->delete('theme');
            }else{
                $new_message = [
                    'message'=>$message,
                    'login'=>$login,
                    'time'=>time()
                ];
                $messages_storage->add_message($new_message);
            }
            
        }

        $view->render('chat', [
            'messages'=>$messages_storage->get_messages(),
            'theme'=>$cookie->get('theme'),
        ]);
    }
}