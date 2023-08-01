<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_setup_errors', 1);

const MESSAGES_FILE = __DIR__ . "messages.json";

require_once "MessagesStorage.php";
require_once "Cookie.php";
require_once "Session.php";
require_once "ServerArrayAccessTrait.php";
require_once "MutableServerArrayTrait.php";
require_once "Post.php";



$messages_storage = new MessagesStorage();
$cookie = new Cookie();
$session = new Session();
$post = new Post();


if(!$session->has('login') && $post->has('user_login')){
    $session->add('login', $post->get('user_login'));
}

$message = $post->get('user_message', null);
$login = $session->get('login', null);

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

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php $style = ($cookie->get('theme', null) == 'night') ? 'style-night.css' : 'style.css'?>
    <link rel="stylesheet" href="<?php echo $style;?>">
</head>
<body>
    <?php
        if($session->has('login')){
            foreach($messages_storage->get_messages() as $msg){
                echo "<div class='message'>";
                echo "<div class='time'>" . date('d.m.Y H:i', $msg['time']) . "</div>";
                echo "<div class='login'>" . htmlspecialchars($msg['login']) . "</div>";
                echo "<div class='message-text'>" . htmlspecialchars($msg['message']) . "</div>";
                echo "</div>";
            }
            echo '<form action="" method="post">
                    <input type="text" name="user_message">
                    <input type="submit" value="Send">
                </form>';
        }else{
            echo '<form action="" method="post">
                    <input type="text" name="user_login">
                    <input type="submit" value="Login">
                  </form>';
        }
        
    ?>

</body>
</html>