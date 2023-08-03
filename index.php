<?php


require_once "vendor/autoload.php";

#ini_set('error_reporting', E_ALL);
#ini_set('display_errors', 1);
#ini_set('display_setup_errors', 1);

const MESSAGES_FILE = __DIR__ . "messages.json";

use flexachiller\chat\Core\Router;

$router = new Router();
$router->run();

?>
