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
require_once "src/Controller/ChatController.php";
require_once "src/Controller/LoginController.php";
require_once "src/Core/Router.php";
require_once "src/Core/View.php";

$router = new Router();
$router->run();

?>
