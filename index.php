<?php
declare(strict_types=1);
spl_autoload_register(function(string $classNamespace) {
    $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
    $path = "src/$path.php";
    require_once($path);
});

require_once('src/utils/debug.php');

use App\Request;
use App\Controller\ArticleController;
use App\Controller\UserController;
session_start();
$config = require_once('config/config.php');

$request = new Request($_GET, $_POST, $_SERVER);

(new ArticleController($request, $config))->run();
(new UserController($request, $config))->run();